<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestCtr extends Controller
{

    public function test()
    {
        return view('test');
        return DB::select("select top 1 * from hpersonal where lastname = 'urbien'");
    }
}
