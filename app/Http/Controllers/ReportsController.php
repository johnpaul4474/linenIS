<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\OfficeWards;
use App\getAll;
use App\getCondemn;

class ReportsController extends Controller
{
    public function index($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $name = DB::SELECT("SELECT * from jhay.linen_office UNION SELECT * from jhay.linen_ward ORDER BY alt_id");
        $ofward = OfficeWards::orderBy('alt_id', 'asc')->pluck('office_name', 'id');
        
        return view('print.reports', compact(
            'mydata',
            'hpersonal',
            'name',
            'id',
            'offward'
        ));
    }

    public function getOffWard($id)
    {
        $ofward = OfficeWards::where('alt_id', $id)
        ->orderBy('office_name', 'asc')
        ->pluck('id','office_name');
        return json_encode($ofward);
    }
    public function getAllDetails($id)
    {
        $tot = getAll::where('g_id', $id)->get();
        $table = json_encode($tot);
        return view('print.getAll',[
            'tot' => $tot
        ]);
    }

    public function printlcs($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $tot = DB::SELECT("EXEC dex.sp_linenGetAllDetails '$id'");

        return view('print.lcs', [
            'mydata' => $mydata,
            'hpersonal' => $hpersonal,
            'tot' => $tot
        ]);
    }

    // CONDEMN FUNCTIONS
    public function getCondemnDetails($id)
    {
        $tot = getCondemn::where('c_id', $id)->get();
        $table = json_encode($tot);
        return view('print.getAllCondemn',[
            'tot' => $tot
        ]);
    }

    
    public function printcondemn($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $tot = DB::SELECT("EXEC dex.sp_getAllCondemnDetails '$id'");

        return view('print.condemn', [
            'mydata' => $mydata,
            'hpersonal' => $hpersonal,
            'tot' => $tot
        ]);
    }


    public function ris()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];

        return view('print.ris', compact(
            'mydata',
            'hpersonal'
        ));
    }

    public function condemn()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];

        return view('print.condemn', compact(
            'mydata',
            'hpersonal'
        ));
    }
}
