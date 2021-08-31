<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\StockRoom;
use App\Storage;

class HomeController extends Controller
{

    public function index()
    {
        $totRaw = DB::SELECT("SELECT COUNT(id) as total FROM jhay.linen_rawmats where is_archived = 0 ");
        $totFinish = DB::SELECT("SELECT COUNT(id) as total FROM jhay.linen_finishmats where is_archived = 0");
        // $totWard = DB::SELECT("SELECT COUNT(id) as total FROM jhay.linen_wardmats where is_archived = 0");
        $totWard = DB::SELECT("SELECT COUNT(id) as total FROM jhay.linen_UpWrdIssdQty");
        $totCondemn = DB::SELECT("SELECT count(id) as total FROM jhay.linen_deductWardInv");
        $mydata = DB::SELECT("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $rooms = StockRoom::orderBy('room_name','asc')->get();
        $storage = Storage::orderBy('storage_name', 'asc')->get();
        // $storage = DB::SELECT("SELECT a.id, a.room_name, b.storage_name from jhay.linen_stockroom as a INNER JOIN jhay.linen_storage as b ON a.id = b.stockroom_id ORDER BY room_name");
        $mydata = $mydata[0];
        $hpersonal = DB::SELECT("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        // dd($totRaw,$totFinish, $totWard);
        return view('home', compact(
            'hpersonal',
            'mydata',
            'totRaw',
            'totFinish',
            'totWard',
            'rooms',
            'storage',
            'totCondemn'
        ));
    }

}
