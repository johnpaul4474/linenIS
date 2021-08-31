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
use App\User;
use App\Office;


class AdminCtr extends Controller
{

    public function monitoring()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $countactlog = actlog::count();
         

        return view('webmaster.monitoring', compact(
            'mydata',
            'hpersonal',
            'countactlog'
        ));
    }

    public function monitoring1()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $countactlog = actlog::count();
         

        return view('webmaster.monitoring', compact(
            'mydata',
            'hpersonal',
            'countactlog'
        ));
    }

}
