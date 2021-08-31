<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Storage;
use App\StockRoom;
use App\actlog;

class StockroomCtr extends Controller
{

    //transfer charges
    public function stockroomlist()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $rooms = StockRoom::orderBy('room_name', 'asc')->get();
        $storages = Storage::orderBy('storage_name', 'asc')->get();

        return view('stockroom.list', compact(
            'mydata',
            'hpersonal',
            'rooms',
            'storages'
        ));
    }

    public function addstockroom()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $rooms = StockRoom::orderBy('room_name', 'asc')->get();

        return view('stockroom.addstockroom', compact(
            'mydata',
            'hpersonal',
            'rooms'
        ));
    }

    public function addstockroomsave(request $request)
    {
        $room = new StockRoom();
        $room->room_name        =$request->room_name;
        $room->save();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Entry Stock Room ID:'.$room->id;
        $actlog->save();

        return redirect('/stockroom/list');
    }
}