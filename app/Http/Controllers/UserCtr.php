<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\linenuser;
use App\actlog;
use DataTables;

class UserCtr extends Controller
{

    public function index()
    {   
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $allhpersonal = DB::select("SELECT * FROM hpersonal order by lastname");
        return view('webmaster.adduserpro1', compact(
            'hpersonal',
            'mydata',
            'allhpersonal'
        ));
    }
    
    public function adduser1($id)
    {
        $employeeid = $id;
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $employee = DB::select("select * from hpersonal where employeeid = '".$employeeid."'");
        $employee = $employee[0];

        return view('webmaster.adduserpro2', compact(
            'mydata',
            'hpersonal',
            'employee'
        ));
    }

    public function adduser2(request $request)
    {
        DB::table('jhay.linen_user')->insert([
            'employeeid'        => $request->employeeid,
            'role_id'           => $request->role_id
             ]);
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Entry New User: '.$request->employeeid.', Role: '.$request->role_id;
        $actlog->save();

        

        return redirect('/userlist');
    }

    public function userlist()
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $users = DB::select("select * from jhay.linen_user as tb1 LEFT JOIN hpersonal as tb2 on tb1.employeeid = tb2.employeeid order by lastname");

        return view('webmaster.userlist', compact(
            'mydata',
            'hpersonal',
            'users'
        ));
    }

    public function edituser($id)
    {
        $mydata = DB::select("SELECT TOP 1 * FROM jhay.linen_user WHERE employeeid = '".Auth::user()->employeeid."'");
        $mydata = $mydata[0];
        $hpersonal = DB::select("SELECT TOP 1 * FROM hpersonal WHERE employeeid = '".Auth::user()->employeeid."'");
        $hpersonal = $hpersonal[0];
        $user = DB::select("select top 1 * from jhay.linen_user as tb1 LEFT JOIN hpersonal as tb2 on tb1.employeeid = tb2.employeeid where tb1.employeeid = '".$id."'");
        $employee = DB::select("select * from hpersonal where employeeid = '".$id."'");
        $employee = $employee[0];

        return view('webmaster.edituser', compact(
            'employee',
            'mydata',
            'hpersonal',
            'user',
            'id'
        ));
    }
    public function editusersave(request $request)
    {
        $updateDetails=array(
            'role_id'           =>$request->role_id
        );

        $user = linenuser::where('employeeid', $request->employeeid)->first();
        $role = $user->role_id;

        DB::table('jhay.linen_user')
            ->where('employeeid', $request->employeeid)
            ->update($updateDetails);
        
        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Edit User: '.$request->employeeid.', From Role: '.$role.' To Role: '.$request->role_id;
        $actlog->save();

        return redirect('/userlist');
    }

    public function deleteuser($id)
    {
        $user = linenuser::where('employeeid', $id)->first();
        $role = $user->role_id;
        $user->delete();

        $actlog = new actlog();
        $actlog->employeeid                 =Auth::user()->employeeid;
        $actlog->act_details                ='Delete User: '.$id.', Role: '.$role;
        $actlog->save();

        return redirect('/userlist');
    }
}
