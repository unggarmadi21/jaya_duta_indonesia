<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Users;
use App\Komunitas;

class LoginAdminController extends Controller
{

    public function regis(Request $req){

        $this->validate($req,[
            'nama_member'   => 'required',
            'username'      => 'required',
            'password'      => 'required'
        ]);

        $date = date('Y-m-d H:i:s');

        try{
            $member = new Users; 

            $member->id_member      = uniqid();
            $member->id_komunitas   = $req->komunitas;
            $member->nama_member    = $req->nama_member;
            $member->username       = $req->username;
            $member->password       = md5($req->password);
            $member->created_at     = $date;

            $member->save();
        }catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
        }

        return redirect('');
    }

      public function login(){
        $komunitas = Komunitas::first();
        return view('login_admin/index_login_admin', compact('komunitas'));
                // return view('dashboard/index_dashboard', compact('komunitas'));
    }


    public function add(){
        $komunitas = Komunitas::first();
        return view('login/register', compact('komunitas'));
    }


    public function login_check(Request $req){

        $count = Users::where('username', $req->username)->count();
        echo $count;
        if ($count > 0) {
            $check = Users::where('username', $req->username)->where('password', md5($req->password))->first();
            //   $check = Users::where('username', $req->username)->first();
            // $komunitas = Komunitas::first();
            if ($check != null) {
                Session::put('nama_user', $check->nama_user);
                Session::put('id_user', $check->id_user);
                Session::put('type_user', $check->role);
                // Session::put('foto', $check->nama_foto);
                // Session::put('komunitas', $komunitas->nama_komunitas);

                return redirect('admin');
            }else{
                echo "Password Salah";
                return back()->with('error', 'Password Salah');
            }
        }else{
            echo "Username Salah";
            return back()->with('error', 'Username Salah');
        }

    }

    public function logout(){
        Session::forget('id_user');
        Session::forget('nama_user');
        Session::forget('type_user');

        return redirect('/');

    }
}
