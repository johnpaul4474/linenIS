<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\FinishMats;
use App\Finishdetails;
use App\Finishprice;
use App\RawMats;
use App\Rawdetails;
use App\Rawprice;
use App\WardMats;
use App\Warddetails;
use App\Wardprice;
use App\actlog;
use App\Storage;
use App\StockRoom;
use App\linenuser;
use App\Wards;

class MaintenanceCtr extends Controller
{   
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////ACTIVITY LOG
    ///////

    public function actlog()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $actlog = DB::select("SELECT * FROM jhay.linen_actlog AS tb1 LEFT JOIN hpersonal AS tb2 ON tb1.employeeid = tb2.employeeid ORDER BY tb1.id DESC");
        $actlog = actlog::select('hospital.dbo.hpersonal.firstname', 'hospital.dbo.hpersonal.lastname', 'hospital.dbo.hpersonal.middlename', 'hospital.jhay.linen_actlog.act_details', 'hospital.jhay.linen_actlog.created_at')
            ->leftJoin('hospital.dbo.hpersonal', 'hospital.jhay.linen_actlog.employeeid', '=', 'hospital.dbo.hpersonal.employeeid')
            ->orderby('created_at', 'desc')
            ->paginate(10);
        

        return view('webmaster.actlog', compact(
            'mydata',
            'hpersonal',
            'actlog'
        ));
    }
    
    public function index()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];

        return view('maintenance.index', compact(
            'mydata',
            'hpersonal'
        ));
    }

    ////////////////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////START OF STAFF MAINTENANCE
    public function staffmaintenance()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $allhpersonal = DB::select("SELECT * FROM hpersonal WHERE empstat = 'A' ORDER BY lastname");
        $users = DB::select("SELECT * FROM jhay.linen_user AS tb1 LEFT JOIN hpersonal AS tb2 ON tb1.employeeid = tb2.employeeid WHERE tb1.role_id != '1' ORDER BY lastname");

        return view('maintenance.staffmaintenance', compact(
            'mydata',
            'hpersonal',
            'allhpersonal',
            'users'
        ));
    }

    public function addstaff($id)
    {
        DB::table('jhay.linen_user')->insert([
            'employeeid'        => $id,
            'role_id'           => '3'
             ]);
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Entry New User: '.$id.', Role: 3';
        $actlog->save();

        return redirect ('/maintenance/staff');

    }

    public function removestaff($id)
    {
        $UA = linenuser::where('employeeid', $id)->first();
        $UA->delete();
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Delete User: '.$id;
        $actlog->save();

        return redirect ('/maintenance/staff');

    }

    ///////////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////END OF STAFF MAINTENANCE

    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////START STOCK ROOM AND STORAGE
    public function stockroomedit($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $SR = StockRoom::where('id', $id)->first();

        return view('maintenance.stockroomedit', compact(
            'mydata',
            'hpersonal',
            'SR'
        ));
    }

    public function stockroomeditsave(request $request)
    {
        
        $SR = StockRoom::where('id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Stock Room Name From: '.$SR->room_name.' To: '.$request->name.' ID: '.$SR->id;
        $actlog->save();

        $SR->room_name          =$request->room_name;
        $SR->save();

        return redirect('/maintenanceedit/stockroom')
            ->withErrors(['confirm' => 'Updated!']);
    }

    public function storageedit($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $STO = Storage::where('id', $id)->first();

        return view('maintenance.storageedit', compact(
            'mydata',
            'hpersonal',
            'STO'
        ));
    }

    public function storageeditsave(request $request)
    {
        $STO = Storage::where('id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Storage Name From: '.$STO->storage_name.' To: '.$request->name.' ID: '.$STO->id;
        $actlog->save();

        $STO->storage_name          =$request->storage_name;
        $STO->save();

        return redirect('/maintenanceedit/storage')
            ->withErrors(['confirm' => 'Updated!']);
    }

    public function movestorage($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $SR = StockRoom::orderby('room_name', 'asc')->get();
        $STO = Storage::where('id', $id)->first();

        return view('maintenance.storagemove', compact(
            'mydata',
            'hpersonal',
            'SR',
            'STO'
        ));
    }

    public function movestoragesave(request $request)
    {
        $STO = Storage::where('id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Move Storage From: '.$STO->stockroom_id.' To: '.$request->stockroom_id.' ID: '.$STO->id;
        $actlog->save();

        $STO->stockroom_id          =$request->stockroom_id;
        $STO->save();


        return redirect('/maintenanceedit/storage')
            ->withErrors(['confirm' => 'Updated!']);
    }
    

    public function indexeditstockroom()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $rooms = StockRoom::orderby('room_name', 'asc')->get();

        return view('maintenance.indexstockroom', compact(
            'mydata',
            'hpersonal',
            'rooms'
        ));
    }

    public function indexeditstorage()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $rooms = StockRoom::orderby('room_name', 'asc')->get();
        $storages = Storage::orderby('storage_name', 'asc')->get();

        return view('maintenance.indexstorage', compact(
            'mydata',
            'hpersonal',
            'rooms',
            'storages'
        ));
    }
    ///////END OF STOCK ROOM AND STORAGE
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    //////////////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////START OF MATERIAL MAINTENANCE

    public function indexeditrawmats()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $RawMats = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb2.id ASC");
        $rooms = StockRoom::orderby('room_name', 'asc')->get();
        $storages = Storage::orderby('storage_name', 'asc')->get();

        return view('maintenance.indexrawmats', compact(
            'mydata',
            'hpersonal',
            'RawMats',
            'rooms',
            'storages'
        ));
    }

    public function indexeditfinishmats()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb1.id ASC");
        $rooms = StockRoom::orderby('room_name', 'asc')->get();
        $storages = Storage::orderby('storage_name', 'asc')->get();

        return view('maintenance.indexfinishmats', compact(
            'mydata',
            'hpersonal',
            'FinishMats',
            'rooms',
            'storages'
        ));
    }

    public function indexeditwardmats()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wards = DB::select("SELECT * FROM jhay.linen_ward ORDER BY ward_name");
        $wardmats = DB::select("SELECT * FROM jhay.linen_wardmats AS tb1 JOIN jhay.linen_wardmatsdetails AS tb2 ON tb1.id = tb2.wardmats_id JOIN jhay.linen_wardprice AS tb3 ON tb1.id = tb3.wardmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb2.item_name ASC");

        return view('maintenance.indexwardmats', compact(
            'mydata',
            'hpersonal',
            'wards',
            'wardmats'
        ));
    }

    public function updateStat(request $request)
    {
        $change = WardMats::where('id', $request->is_archived)->first();
        if($change->is_archived == '0')
        {
            $change->is_archived = '1';
        }
        else
        {
            $change->is_archived = '0';
        }
        $change->save();

        return redirect('maintenance.indexwardmats');
    }
    public function indexeditprice()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $rooms = StockRoom::orderby('room_name', 'asc')->get();
        $storages = Storage::orderby('storage_name', 'asc')->get();
        $RawMats = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb2.id ASC");
        $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb1.id ASC");
        $wardmats = DB::select("SELECT * FROM jhay.linen_wardmats AS tb1 JOIN jhay.linen_wardmatsdetails AS tb2 ON tb1.id = tb2.wardmats_id JOIN jhay.linen_wardprice AS tb3 ON tb1.id = tb3.wardmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb2.item_name ASC");
        $wards = DB::select("SELECT * FROM jhay.intranet_ward ORDER BY ward_name");

        return view('maintenance.indexprice', compact(
            'mydata',
            'hpersonal',
            'rooms',
            'storages',
            'RawMats',
            'FinishMats',
            'wards',
            'wardmats'
        ));
    }


    public function priceraw($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $RawMats = DB::select("SELECT TOP 1 * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb1.id = '".$id."' AND tb3.price_stat = '1'");
        $RawMats = $RawMats[0];

        return view('maintenance.ChangeRawPrice', compact(
            'mydata',
            'hpersonal',
            'RawMats'
        ));
    }


    public function pricefinish($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $FinishMats = DB::select("SELECT TOP 1 * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb1.id = '".$id."' AND tb3.price_stat = '1'");
        $FinishMats = $FinishMats[0];

        return view('maintenance.ChangeFinishPrice', compact(
            'mydata',
            'hpersonal',
            'FinishMats'
        ));
    }


    public function priceward($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $wardmats = DB::select("SELECT TOP 1 * FROM jhay.linen_wardmats AS tb1 JOIN jhay.linen_wardmatsdetails AS tb2 ON tb1.id = tb2.wardmats_id JOIN jhay.linen_wardprice AS tb3 ON tb1.id = tb3.wardmats_id WHERE tb1.id = '".$id."' AND tb3.price_stat = '1'");
        $wardmats = $wardmats[0];

        return view('maintenance.ChangeWardPrice', compact(
            'mydata',
            'hpersonal',
            'wardmats'
        ));
    }

    public function pricerawsave(request $request)
    {
        DB::table('jhay.linen_rawprice')
            ->where('rawmats_id', $request->rawmats_id)
            ->update(['price_stat' => '0']);

        $RP = new Rawprice();
        $RP->rawmats_id     =$request->rawmats_id;
        $RP->item_price     =$request->item_price;
        $RP->save();
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Raw Mats Price ID:'.$request->rawmats_id;
        $actlog->save();

        return redirect('/maintenance/database')
            ->withErrors(['confirm' => 'Saved!']);
    }


    public function pricefinishsave(request $request)
    {
        DB::table('jhay.linen_finishprice')
            ->where('finishmats_id', $request->finishmats_id)
            ->update(['price_stat' => '0']);

        $FP = new Finishprice();
        $FP->finishmats_id     =$request->finishmats_id;
        $FP->item_price        =$request->item_price;
        $FP->save();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Finish Mats Price ID:'.$request->finishmats_id;
        $actlog->save();

        return redirect('/maintenance/database')
            ->withErrors(['confirm' => 'Saved!']);
    }


    public function pricewardsave(request $request)
    {
        DB::table('jhay.linen_wardprice')
            ->where('wardmats_id', $request->wardmats_id)
            ->update(['price_stat' => '0']);

        $WP = new Wardprice();
        $WP->wardmats_id       =$request->wardmats_id;
        $WP->item_price        =$request->item_price;
        $WP->save();
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Ward Mats Price ID:'.$request->wardmats_id;
        $actlog->save();

        return redirect('/maintenance/database')
            ->withErrors(['confirm' => 'Saved!']);
    }///////END OF PRICE MAINTENANCE
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    //////////////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    //////////////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////MATERIAL MAINTENANCE
    ///////FINISH PRODUCTS
    public function finishedit($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb1.id = '".$id."'");
        $FinishMats = $FinishMats[0];
        $Raw = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id");

        return view('maintenance.finishedit', compact(
            'mydata',
            'hpersonal',
            'FinishMats',
            'Raw'
        ));
    }

    public function finisheditsave(request $request)
    {
        $FM = FinishMats::where('id', $request->id)->first();
        $FD = Finishdetails::where('finishmats_id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Finish Product ID: '.$request->id.' RawMat= FROM: '.$FM->rawmats_id.' TO: '.$request->raw_mat.' Date= FROM: '.$FM->item_datefinished.' To: '.$request->item_datefinished.' ITEM NAME= FROM: '.$FD->item_name.' TO: '.$request->item_name.' ITEM UNIT= FROM: '.$FD->item_unit.' TO: '.$request->item_unit.' ITEM QTY= FROM: '.$FD->item_qty.' TO: '.$request->item_qty;
        $actlog->save();

        
        $FM->rawmats_id             =$request->raw_mat;
        $FM->item_datefinished      =$request->item_datefinished;
        $FM->save();
        
        $FD->item_name              =$request->item_name;
        $FD->item_unit              =$request->item_unit;
        $FD->item_qty               =$request->item_qty;
        $FD->save();
        
        
        return redirect('/maintenanceedit/finishmats')
            ->withErrors(['confirm' => 'Saved!']);
    }

    public function finishmove($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb1.id = '".$id."'");
        $FinishMats = $FinishMats[0];
        $SR = StockRoom::orderby('room_name', 'asc')->get();
        $STO = Storage::orderby('storage_name', 'asc')->get();

        return view('maintenance.finishmove', compact(
            'mydata',
            'hpersonal',
            'FinishMats',
            'SR',
            'STO'
        ));
    }

    public function finishmovesave(request $request)
    {
        $FM = FinishMats::where('id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Move Finish Product From StorageID: '.$FM->storage_id.' To StorageID: '.$request->storage_id;
        $actlog->save();

        $FM->storage_id             =$request->storage_id;
        $FM->save();
        
        return redirect('/maintenanceedit/finishmats')
            ->withErrors(['confirm' => 'Saved!']);
    }
    

    

    ////////RAW MATERIALS
    public function rawedit($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $RawMats = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb1.id = '".$id."'");
        $RawMats = $RawMats[0];
        $Raw = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id");

        return view('maintenance.rawedit', compact(
            'mydata',
            'hpersonal',
            'RawMats'
        ));
    }

    public function raweditsave(request $request)
    {
        $RM = RawMats::where('id', $request->id)->first();
        $RD = Rawdetails::where('rawmats_id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Raw Material ID: '.$request->id.' DateReceived= FROM: '.$RM->item_datereceived.' To: '.$request->item_datereceived.' ITEM NAME= FROM: '.$RD->item_name.' TO: '.$request->item_name.' ITEM UNIT= FROM: '.$RD->item_unit.' TO: '.$request->item_unit.' ITEM QTY= FROM: '.$RD->item_qty.' TO: '.$request->item_qty;
        $actlog->save();


        $RM->date_received          =$request->date_received;
        $RM->save();
        
        $RD->item_name              =$request->item_name;
        $RD->item_unit              =$request->item_unit;
        $RD->item_qty               =$request->item_qty;
        $RD->save();
        
        
        return redirect('/maintenanceedit/rawmats')
            ->withErrors(['confirm' => 'Saved!']);
    }

    public function rawmove($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $RawMats = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb1.id = '".$id."'");
        $RawMats = $RawMats[0];
        $SR = StockRoom::orderby('room_name', 'asc')->get();
        $STO = Storage::orderby('storage_name', 'asc')->get();

        return view('maintenance.rawmove', compact(
            'mydata',
            'hpersonal',
            'RawMats',
            'SR',
            'STO'
        ));
    }

    public function rawmovesave(request $request)
    {
        $RM = RawMats::where('id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Move Raw Material From StorageID: '.$RM->storage_id.' To StorageID: '.$request->storage_id;
        $actlog->save();

        $RM->storage_id             =$request->storage_id;
        $RM->save();
        
        return redirect('/maintenanceedit/rawmats')
            ->withErrors(['confirm' => 'Saved!']);
    }
    


    //////// WARD MATERIALS
    public function wardmatsedit($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $WardMats = DB::select("SELECT * FROM jhay.linen_wardmats AS tb1 JOIN jhay.linen_wardmatsdetails AS tb2 ON tb1.id = tb2.wardmats_id JOIN jhay.linen_wardprice AS tb3 ON tb1.id = tb3.wardmats_id WHERE tb1.id = '".$id."'");
        $WardMats = $WardMats[0];
        $Ward = Wards::where('id', $WardMats->ward_id)->first();

        return view('maintenance.wardmatsedit', compact(
            'mydata',
            'hpersonal',
            'WardMats',
            'Ward'
        ));
    }

    public function wardmatseditsave(request $request)
    {
        $WM = WardMats::where('id', $request->id)->first();
        $WD = Warddetails::where('wardmats_id', $request->id)->first();


        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit Ward Products, ID: '.$request->id.' DateReceived= FROM: '.$WM->date_issued.' To: '.$request->date_issued.' ITEM NAME= FROM: '.$WD->item_name.' TO: '.$request->item_name.' ITEM UNIT= FROM: '.$WD->item_unit.' TO: '.$request->item_unit.' ITEM QTY= FROM: '.$WD->item_qty.' TO: '.$request->item_qty;
        $actlog->save();

        
        $WM->item_issued            =$request->item_issued;
        $WM->save();
        
        $WD->item_name              =$request->item_name;
        $WD->item_unit              =$request->item_unit;
        $WD->item_qty               =$request->item_qty;
        $WD->save();

        
        return redirect('/maintenanceedit/wardmats')
            ->withErrors(['confirm' => 'Saved!']);
    }

    public function wardmatsmove($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $WardMats = DB::select("SELECT * FROM jhay.linen_wardmats AS tb1 JOIN jhay.linen_wardmatsdetails AS tb2 ON tb1.id = tb2.wardmats_id JOIN jhay.linen_wardprice AS tb3 ON tb1.id = tb3.wardmats_id WHERE tb1.id = '".$id."'");
        $WardMats = $WardMats[0];
        $Wards = Wards::orderby('ward_name', 'asc')->get();

        return view('maintenance.wardmatsmove', compact(
            'mydata',
            'hpersonal',
            'WardMats',
            'Wards'
        ));
    }

    public function wardmatsmovesave(request $request)
    {
        $WM = WardMats::where('id', $request->id)->first();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Move Ward Product From Ward_id: '.$WM->storage_id.' To Ward_id: '.$request->storage_id;
        $actlog->save();

        $WM->ward_id             =$request->ward_id;
        $WM->save();
        
        return redirect('/maintenanceedit/wardmats')
            ->withErrors(['confirm' => 'Saved!']);
    }

    public function report(){
        return view('/maintenance/report');
    }
    ///////////////////////END OF MATERIAL MAINTENANCE
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////
    ///////////////////////

}

// use App\FinishMats;
// use App\Finishdetails;
// use App\Finishprice;
// use App\RawMats;
// use App\Rawdetails;
// use App\Rawprice;
// use App\WardMats;
// use App\Warddetails;
// use App\Wardprice;
// use App\actlog;
// use App\Storage;
// use App\StockRoom;
// use App\linenuser;