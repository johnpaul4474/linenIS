<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Storage;
use App\StockRoom;
use App\RawMats;
use App\FinishMats;
use App\Rawprice;
use App\Finishprice;
use App\actlog;

class StorageCtr extends Controller
{
    public function storagelist()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $storages = Storage::orderBy('storage_name', 'asc')->get();
        $rooms = StockRoom::orderby('room_name', 'asc')->get();

        return view('storage.list', compact(
            'mydata',
            'hpersonal',
            'storages',
            'rooms'
        ));
    }

    public function addstorage()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $storages = Storage::orderBy('storage_name', 'asc')->get();
        $rooms = StockRoom::orderBy('room_name', 'asc')->get();

        return view('storage.addstorage', compact(
            'mydata',
            'hpersonal',
            'storages',
            'rooms'
        ));
    }

    public function addstoragesave(request $request)
    {
        $storage = new Storage;
        $storage->stockroom_id          =$request->stockroom_id;
        $storage->storage_name          =$request->storage_name;
        $storage->save();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Entry Storage ID:'.$storage->id;
        $actlog->save();

        return redirect('/add/storage');
    }

    public function perstorage($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $storage = Storage::where('id', $id)->first();
        $room = StockRoom::where('id', $storage->stockroom_id)->first();
        $raws = DB::select("SELECT *, (tb2.item_qty * tb3.item_price) AS total_cost FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb3.price_stat = '1' AND tb1.storage_id = '".$id."' ORDER BY tb2.item_name ASC");
        $finishs = DB::select("SELECT *, (tb2.item_qty * tb3.item_price) AS total_cost FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' AND tb1.storage_id = '".$id."' ORDER BY tb2.item_name ASC");

        return view('storage.perstorage', compact(
            'mydata',
            'hpersonal',
            'storage',
            'room',
            'raws',
            'finishs'
        ));
    }
}