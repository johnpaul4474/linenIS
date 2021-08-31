<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\actlog;
use App\Office;
use App\OfficeMats;
use App\OfficeDetails;
use App\OfficePrice;
use App\Con_OfficeMats;
use App\Con_OfficeDetails;
use App\Con_OfficePrice;
use App\StockRoom;
use App\Storage;
use App\IssueStorage;
use App\IssuedtoWards;
use Carbon\Carbon;


class LinenOfficeCtr extends Controller
{
    public function addoffice()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $offices = DB::select("SELECT * FROM jhay.linen_office ORDER BY office_name ASC");

        return view('linenward.addoffice', compact(
            'mydata',
            'hpersonal',
            'offices'
        ));
    }
    
    public function addofficesave(request $request)
    {
        $offices = new Office();
        $offices->office_name   =$request->office_name;
        $offices->save();
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Add Entry Office ID:'.$offices->id;
        $actlog->save();

        return redirect('/add/office')
            ->withErrors(['confirm' => 'Updated!']);
    }

    public function release($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $offices = Office::orderby('office_name', 'asc')->pluck('office_name', 'id');
        $stockroom = StockRoom::orderBy('room_name','asc')->pluck('room_name', 'id');
        $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' ORDER BY tb2.item_name ASC");

        return view('linenward.releaseo', compact(
            'mydata',
            'hpersonal',
            'FinishMats',
            'offices',
            'id',
            'stockroom'
        ));
        
    }

    public function getStorageOffice($id)
    {
        $getStorageOffice = Storage::where('stockroom_id', $id)->pluck('id', 'storage_name');
        return json_encode($getStorageOffice);
    }

    public function getToIssueOffice($id)
    {
        $getToIssueOffice = IssueStorage::where('storage_id', $id)
        ->orderBy('storage_name', 'asc')
        ->pluck('item_id', 'item_name');
        return json_encode($getToIssueOffice);
    }

    public function getToIssueOfficeDetails($id)
    {
        $getToIssueOffice = IssuedToWards::where('item_id', $id)->first();
        $table = json_encode($getToIssueOffice);
        return view('linenward.issued_to_office',[
            'getToIssueOffice' => $getToIssueOffice
        ]);
    }

    public function UpIssuedOfficeQty(Request $r)
    {
        $office_id = $r->office_id;
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
        $offices = Office::orderBy('office_name', 'asc')->pluck('office_name', 'id');
        $issued = DB::UPDATE("EXEC dex.sp_UpdateIssuedQty '$item_qty_issued', '$item_id'");
        $get = DB::UPDATE("INSERT INTO jhay.linen_UpOfIssdQty (office_id, stockroom_id, storage_id, item_id, item_qty_issued_Office, updated_by, created_at ) VALUES ('$office_id', '$stockroom_id', '$storage_id', '$item_id', '$item_qty_issued', '$updated_by', '$created_at' )");
        return view('linenward.releaseo', [
            'mydata' => $mydata,
            'hpersonal' => $hpersonal,
            'issued' => $issued,
            'get' => $get,
            'offices' => $offices,
            'stockroom' => $stockroom

        ]);

    }

    public function releasesave(request $request)
    {   
        $officemats = new OfficeMats();
        $officemats->item_issued               =$request->date_issued;
        $officemats->office_id                   =$request->office_id;
        $officemats->save();

        $officedetails = new OfficeDetails();
        $officedetails->officemats_id           =$officemats->id;
        $officedetails->item_name             =$request->item_name;
        $officedetails->item_unit             =$request->item_unit;
        $officedetails->item_qty              =$request->item_qty;
        $officedetails->save();

        $officeprice = new OfficePrice();
        $officeprice->officemats_id             =$officemats->id;
        $officeprice->item_price              =$request->item_price;
        $officeprice->save();

        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Add Entry Issue Office Mats ID:'.$officemats->id;
        $actlog->save();

        return redirect('/office/'.$request->office_id);
    }

    public function release_cono($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $offices = Office::orderBy('office_name', 'asc')->pluck('office_name', 'id');
        // $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' ORDER BY tb2.item_name ASC");

        return view('linenward.con_releaseo', compact(
            'mydata',
            'hpersonal',
            'offices',
            'id'
        ));
    }

    public function getOfficeDetails($id)
    {
        // $officeDetails = ;
    }

    public function release_conosave(request $request)
    {   
        $officemats = new Con_OfficeMats();
        $officemats->item_issued               =$request->date_issued;
        $officemats->office_id                   =$request->office_id;
        $officemats->save();

        $officedetails = new Con_OfficeDetails();
        $officedetails->officemats_id           =$officemats->id;
        $officedetails->item_name             =$request->item_name;
        $officedetails->item_unit             =$request->item_unit;
        $officedetails->item_qty              =$request->item_qty;
        $officedetails->save();

        $officeprice = new Con_OfficePrice();
        $officeprice->officemats_id             =$officemats->id;
        $officeprice->item_price              =$request->item_price;
        $officeprice->save();

        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Add Entry Issue Office Mats ID:'.$officemats->id;
        $actlog->save();

        return redirect('/office/'.$request->office_id);
    }
}
