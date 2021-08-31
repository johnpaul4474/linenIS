<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\RawMats;
use App\Rawdetails;
use App\Rawprice;
use App\actlog;
use App\Storage;
use App\StockRoom;
use Illuminate\Support\Facades\Input;

class RawMatsCtr extends Controller
{
    
    public function index()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $RawMats1 = DB::select("SELECT *, (tb2.item_qty * tb3.item_price) AS total_price FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb3.price_stat = '1' AND tb1.is_available = '1' AND is_archived = '0' ORDER BY tb1.id DESC");
        
        $RawMats2 = DB::select("SELECT *, (tb2.item_qty * tb3.item_price) AS total_price FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id JOIN jhay.linen_rawprice AS tb3 ON tb1.id = tb3.rawmats_id WHERE tb3.price_stat = '1' AND tb1.is_available = '0' AND is_archived = '0' ORDER BY tb2.id DESC");

        return view('linenraw.viewraw', compact(
            'hpersonal',
            'mydata',
            'RawMats1',
            'RawMats2'
        ));
    }

    public function addrawmat()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $rooms = StockRoom::orderBy('room_name','asc')->get();
        $storages = Storage::orderBy('storage_name', 'asc')->get();

        return view('linenraw.addraw', compact(
            'hpersonal',
            'mydata',
            'rooms',
            'storages'
        ));
    }

    public function addrawmatsave(request $request)
    {

        if (count(Input::get('item_name')) > 0) {
            foreach (Input::get('item_name') as $key => $val) {

                    $RawMat = new RawMats();
                    $RawMat->storage_id               =$request->storage_id;
                    $RawMat->date_received            =Input::get("date_received.$key");
                    $RawMat->save();

                    $details = new Rawdetails;
                    $details->rawmats_id            = $RawMat->id;
                    $details->item_name             = Input::get("item_name.$key");
                    $details->item_unit             = Input::get("item_unit.$key");
                    $details->item_qty              = Input::get("item_qty.$key");
                    $details->save();

                    $price = new Rawprice;
                    $price->rawmats_id              = $RawMat->id;
                    $price->item_price                   = Input::get("item_price.$key");
                    $price->save();

                    $actlog = new actlog();
                    $actlog->employeeid                 =Auth::user()->employeeid;
                    $actlog->act_details                ='Entry Raw Mats ID:'.$RawMat->id;
                    $actlog->save();
            }
        }


        


        return redirect('/view/raw');
    }

}
