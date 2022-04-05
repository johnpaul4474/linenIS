<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CheckCtr;
use Illuminate\Support\Facades\Auth;
Use App\Models\registerModel;
use DB;
use App\actlog;


use App\linenuser;

class RegisterLinenController extends Controller
{
    protected  function register(Request $request)
    {
        $verifyHomisAccountIfExist = "";
        $wardList = DB::Select("SELECT * FROM jhay.linen_ward ORDER BY ward_name ASC");
        $officeList = DB::Select("SELECT * FROM jhay.linen_office ORDER BY office_name ASC");

        return view('register', compact(
            'verifyHomisAccountIfExist','wardList','officeList'
        ));
    }
    
    protected  function registerValidate(Request $request)
    {
        //dd($request);
        $verifyHomisAccountIfExist = DB::select("
                                    Select top 1 * from hospital.dbo.user_acc
                                    where  user_name = '$request->username'
                                    and user_pass = webapp.dbo.ufn_crypto('$request->password',1)
                                    ");                                   
                                  
        $wardList = DB::Select("SELECT * FROM jhay.linen_ward ORDER BY ward_name ASC");
        $officeList = DB::Select("SELECT * FROM jhay.linen_office ORDER BY office_name ASC");

        if (count ($verifyHomisAccountIfExist) == 1){
            $employee_id = $verifyHomisAccountIfExist[0]->employeeid;
            $verifyLinenUser = DB::select("Select top 1 * from jhay.linen_user
                                    where  employeeid = '$employee_id'");

            if(count($verifyLinenUser) == 1 ){
                $verifyHomisAccountIfExist = "linen_duplicate";
                return view('/register',compact('verifyHomisAccountIfExist','wardList','officeList'));
            }else{
                // dd($verifyHomisAccountIfExist,$request);
                $actlog = new actlog();
                $actlog->employeeid  = $verifyHomisAccountIfExist[0]->employeeid;
                $actlog->act_details ='Entry New User: '.$verifyHomisAccountIfExist[0]->employeeid.', Role: '.'4';
                $actlog->save();

                
                DB::table('jhay.linen_user')->insert([
                    'employeeid'        => $verifyHomisAccountIfExist[0]->employeeid,
                    'ward_id'           => $request->ward_id,
                    'office_id'         => $request->office_id,
                    'role_id'           => 4
                    ]);
        
            
                $verifyHomisAccountIfExist = "homis_exist";
            
                return view('/register',compact('verifyHomisAccountIfExist','wardList','officeList'));
            }
            
        }else{
            $verifyHomisAccountIfExist = "homis_not_exist";
            //dd($verifyHomisAccountIfExist);
            return view('/register',compact('verifyHomisAccountIfExist','wardList','officeList'));

        }
    }



  
}
