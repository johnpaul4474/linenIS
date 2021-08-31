<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Auth;
use App\FinishMats;
use App\Finishdetails;
use App\Finishprice;
use App\RawMats;
use App\actlog;
use App\Storage;
use App\StockRoom;
// use Illuminate\Support\Facades\Input;

class FinishMatsCtr extends Controller
{
    public function index()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $FinishMats = DB::select("SELECT * FROM jhay.linen_finishmats AS tb1 JOIN jhay.linen_finishmatsdetails AS tb2 ON tb1.id = tb2.finishmats_id JOIN jhay.linen_finishprice AS tb3 ON tb1.id = tb3.finishmats_id WHERE tb3.price_stat = '1' AND is_archived = '0' ORDER BY tb1.id DESC");

        return view('linenfinish.index', compact(
            'hpersonal',
            'mydata',
            'FinishMats'
        ));
    }

    public function addfinishmat()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $Raw = DB::select("SELECT * FROM jhay.linen_rawmats AS tb1 JOIN jhay.linen_rawmatsdetails AS tb2 ON tb1.id = tb2.rawmats_id");
        $rooms = StockRoom::orderBy('room_name','asc')->get();
        $storages = Storage::orderBy('storage_name', 'asc')->get();

        return view('linenfinish.addfinish', compact(
            'hpersonal',
            'mydata',
            'Raw',
            'rooms',
            'storages'
        ));
    }

    public function addfinishmatsave(request $request)
    {
        // dd($request->all());
        if (count(Request::get('name')) > 0) {
            foreach (Request::get('name') as $key => $val) {

                $FinishMat = new FinishMats();
                $FinishMat->storage_id                =$request->storage_id;
                $FinishMat->rawmats_id                =Request::get("raw_mat.$key");
                $FinishMat->item_datefinished         =Request::get("date_created.$key");
                $FinishMat->save();

                $FinishDetails = new Finishdetails();
                $FinishDetails->finishmats_id       =$FinishMat->id;
                $FinishDetails->item_name           =Request::get("item_name.$key");
                $FinishDetails->item_unit           =Request::get("item_unit.$key");
                $FinishDetails->item_qty            =Request::get("item_qty.$key");
                $FinishDetails->save();

                $Finishprice = new Finishprice();
                $Finishprice->finishmats_id         =$FinishMat->id;
                $Finishprice->item_price            =Request::get("item_price.$key");
                $Finishprice->save();

                $actlog = new actlog();
                $actlog->employeeid                 =Auth::user()->employeeid;
                $actlog->act_details                ='Add Entry Finish Mats ID:'.$FinishMat->id;
                $actlog->save();
            }
        }

        return redirect('/view/finish');
    }
}
