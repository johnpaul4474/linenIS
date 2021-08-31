<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\WardMats;
use App\Warddetails;
use App\Wardprice;
use App\FinishMats;
use App\actlog;
use App\Wards;
use App\ViewWardDetails;
use App\CondemnDetails;
use App\IssuedToWards;
use App\StockRoom;
use App\Storage;
use App\IssueStorage;

use Carbon\Carbon;

class LinenWardCtr extends Controller
{

    public function wardlist()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wards = DB::select("SELECT * FROM jhay.linen_ward ORDER BY ward_name ASC");
        
        return view('linenward.wardlist', compact(
            'hpersonal',
            'mydata',
            'wards'
        ));
    }

    public function perward($id)
    {   
        $ward_name = DB::select("SELECT TOP 1 * FROM jhay.linen_ward where id = '".$id."'");
        $wardname = $ward_name[0];
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $warddetails = DB::select("SELECT *, (tb2.item_qty * tb3.item_price) AS total_cost FROM jhay.linen_wardmats AS tb1 JOIN jhay.linen_wardmatsdetails AS tb2 ON tb1.id = tb2.wardmats_id JOIN jhay.linen_wardprice AS tb3 ON tb1.id = tb3.wardmats_id WHERE tb3.price_stat = '1' AND ward_id = '".$id."' AND is_archived = '0' ORDER BY tb2.item_name ASC");

        return view('linenward.warddetails', compact(
            'mydata',
            'hpersonal',
            'wardname',
            'warddetails'
        ));
    }

    public function release($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wards = Wards::orderBy('ward_name', 'asc')->pluck('ward_name', 'id');
        $FinishMats = DB::select("SELECT * FROM jhay.vw_linenIssuedDetails");
        $stockroom = StockRoom::orderBy('room_name','asc')->pluck('room_name', 'id');

        return view('linenward.release', compact(
            'mydata',
            'hpersonal',
            'FinishMats',
            'wards',
            'id',
            'stockroom'
        ));
    }

    public function getStorage($id)
    {
        $getStorage = Storage::where('stockroom_id', $id)->pluck('id', 'storage_name');
        return json_encode($getStorage);
    }

    public function getToIssue($id)
    {
        $getToIssue = IssueStorage::where('storage_id', $id)
        ->orderBy('storage_name', 'asc')
        ->pluck('item_id', 'item_name');
        return json_encode($getToIssue);
    }

    public function getToIssueDetails($id)
    {
        $getToIssue = IssuedToWards::where('item_id', $id)->first();
        $table = json_encode($getToIssue);
        return view('linenward.issued_to_wards',[
            'getToIssue' => $getToIssue
        ]);
    }

    public function UpIssuedWrdQty(Request $r)
    {
        $ward_id = $r->ward_id;
        $stockroom_id = $r->stockroom_id;
        $storage_id = $r->storage_id;
        $item_id = $r->issue_item_id;
        $item_qty_issued = $r->issue_item_qty;
        $updated_by = Auth::user()->employeeid;
        $created_at = Carbon::now();

        $stockroom = StockRoom::orderBy('room_name','asc')->pluck('room_name', 'id');
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wards = Wards::orderBy('ward_name', 'asc')->pluck('ward_name', 'id');
        $issued = DB::UPDATE("EXEC dex.sp_UpdateIssuedQty '$item_qty_issued', '$item_id'");
        $get = DB::UPDATE("INSERT INTO jhay.linen_UpWrdIssdQty (ward_id, stockroom_id, storage_id, item_id, item_qty_issued, updated_by, created_at ) VALUES ('$ward_id', '$stockroom_id', '$storage_id', '$item_id', '$item_qty_issued', '$updated_by', '$created_at' )");
        return view('linenward.release', [
            'mydata' => $mydata,
            'hpersonal' => $hpersonal,
            'issued' => $issued,
            'get' => $get,
            'wards' => $wards,
            'stockroom' => $stockroom

        ]);

    }



    public function releasesave(request $request)
    {   
        $wardmats = new WardMats();
        $wardmats->item_issued               =$request->date_issued;
        $wardmats->ward_id                   =$request->ward_id;
        $wardmats->save();

        $Warddetails = new Warddetails();
        $Warddetails->wardmats_id           =$wardmats->id;
        $Warddetails->item_name             =$request->item_name;
        $Warddetails->item_unit             =$request->item_unit;
        $Warddetails->item_qty              =$request->item_qty;
        $Warddetails->created_at            =Carbon::now();
        $Warddetails->save();

        $Wardprice = new Wardprice();
        $Wardprice->wardmats_id             =$wardmats->id;
        $Wardprice->item_price              =$request->item_price;
        $Wardprice->save();

        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Add Entry Issue Ward Mats ID:'.$wardmats->id;
        $actlog->save();

        return redirect('/ward/'.$request->ward_id);
    }

    public function addward()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wards = DB::select("SELECT * FROM jhay.linen_ward ORDER BY ward_name ASC");

        return view('linenward.addward', compact(
            'mydata',
            'hpersonal',
            'wards'
        ));
    }
    
    public function addwardsave(request $request)
    {
        $wards = new Wards();
        $wards->ward_name   =$request->ward_name;
        $wards->save();
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Add Entry Ward ID:'.$wards->id;
        $actlog->save();

        return redirect('/add/ward')
            ->withErrors(['confirm' => 'Updated!']);
    }

    public function release_con($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        // $wards = DB::select("SELECT * FROM jhay.linen_ward ORDER BY ward_name ASC");
        // $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' ORDER BY tb2.item_name ASC");
        $wards = Wards::orderBy('ward_name', 'asc')->pluck('ward_name', 'id');
        $lists = DB::SELECT('SELECT * FROM jhay.linen_deductWardInv');
        // $wardDetails = ViewWardDetails::orderby('ward_name', 'asc')->get();

        return view('linenward.con_release', compact(
            'mydata',
            'hpersonal',
            'wards',
            'id', 
            'lists'
        ));
    }

    public function getWardDetails($id)
    {
        $wardDetails = ViewWardDetails::where('id', $id)->pluck('item_id', 'item_name');
        return json_encode($wardDetails);
    }
    
    public function getWardDetails1($id)
    {
        $itemDetails = ViewWardDetails::where('item_id', $id)->first();
        $table = json_encode($itemDetails);
        return view('linenward.con_release_table',[
            'itemDetails' => $itemDetails
        ]);
    }

    public function deductWardItem(Request $r)
    {
        $ward_id = $r->id;
        $item_id = $r->item_id;
        $item_qty = $r->item_qty;
        $updated_at = Auth::user()->employeeid;
        $created_at = Carbon::now();
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wards = Wards::orderBy('ward_name', 'asc')->pluck('ward_name', 'id');
        // dd($ward_id);
        $deduct = DB::UPDATE("EXEC dex.sp_UpdateWardQty '$item_qty','$item_id'");
        $d = DB::UPDATE("INSERT INTO jhay.linen_deductWardInv (ward_id, item_id, item_qty_deducted, updated_by, created_at) VALUES('$ward_id','$item_id', '$item_qty', '$updated_at','$created_at')");

        return view('linenward.con_release', [
            'mydata' => $mydata,
            'hpersonal' => $hpersonal,
            'deduct' => $deduct, 
            'd' => $d,
            'wards' => $wards,
        ]);
    }

    public function getDeductDetails($id)
    {
        $condemnDetails = CondemnDetails::join('hospital.dbo.hpersonal as hp', 'jhay.linen_deductWardInv.updated_by', '=', 'hp.employeeid')
        ->join('jhay.linen_ward as w', 'jhay.linen_deductWardInv.ward_id', '=', 'w.id')
        ->where('jhay.linen_deductWardInv.id', $id)
        ->select('jhay.linen_deductWardInv.*', 'hp.lastname')
        ->get();
        dd($condemnDetails);
        $table = json_encode($condemnDetails);
        return view('linenward.con_ward_table', compact(
            'condemnDetails'
        ));
    }
    
    public function release_consave(request $request)
    {   
        $wardmats = new Con_WardMats();
        $wardmats->item_issued               =$request->date_issued;
        $wardmats->ward_id                   =$request->ward_id;
        $wardmats->save();

        $warddetails = new Con_WardDetails();
        $warddetails->wardmats_id           =$wardmats->id;
        $warddetails->item_name             =$request->item_name;
        $warddetails->item_unit             =$request->item_unit;
        $warddetails->item_qty              =$request->item_qty;
        $warddetails->save();

        $wardprice = new Con_WardPrice();
        $wardprice->wardmats_id             =$wardmats->id;
        $wardprice->item_price              =$request->item_price;
        $wardprice->save();

        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Add Entry Issue ward Mats ID:'.$wardmats->id;
        $actlog->save();

        return redirect('/ward/'.$request->ward_id);
    }

}