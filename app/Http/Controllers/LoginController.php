<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Member;
use App\Komunitas;
use Redirect;

class LoginController extends Controller
{
    public function add(){
        $komunitas = Komunitas::first();
        return view('login/register', compact('komunitas'));
    }

    public function login(){
        $komunitas = Komunitas::first();
        return view('login/login', compact('komunitas'));
    }

    public function regis(Request $req){

        $this->validate($req,[
            'nama_member'   => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'nama_foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username'      => 'required',
            'password'      => 'required',
            // 'nama_mobil'    => 'required',
            // 'plat_mobil'    => 'required',
            'nomor_id'      => 'required',
            // 'id_sosmed'     => 'required',
            'captcha'       => 'required|captcha'
        ],['captcha.captcha'=>'Invalid captcha code.']);

        $komunitas = Komunitas::where('id_komunitas', $req->komunitas)->count();
        if ($komunitas >= 500) {
            echo "Member Komunitas ini telah penuh";
            return back()->with('error', 'Member Komunitas ini telah penuh');
        }

        $check_member = Member::where('username', $req->username)->count();
        if ($check_member > 0) {
            echo "Username sudah ada";
            return Redirect::back()->with('error', 'Member Komunitas ini telah penuh');
        }

        $date = date('Y-m-d H:i:s');


        if ($req->hasFile('nama_foto')) {
            $destinationPath = public_path() .'/assets/images/member/';
            $files = $req->file('nama_foto'); // will get all files

            $file_name = time() . '.' .$files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder
        }

        try{
            $data = new Member; 

            $data->id_member             = uniqid();
            $data->id_komunitas          = $req->komunitas;
            $data->nama_member           = $req->nama_member;
            $data->tempat_lahir          = $req->tempat_lahir;
            $data->tanggal_lahir         = $req->tanggal_lahir;
            $data->jenis_kelamin         = $req->jenis_kelamin;
            $data->alamat                = $req->alamat;
            $data->email                 = $req->email;
            $data->no_telp               = $req->no_telp;
            $data->nama_foto             = $file_name;
            $data->username              = $req->username;
            $data->password              = md5($req->password);
            // $data->nama_mobil            = $req->nama_mobil;
            // $data->plat_mobil            = $req->plat_mobil;
            $data->nomor_id              = $req->nomor_id;
            // $data->id_sosmed             = $req->id_sosmed;
            $data->tanggal_bergabung     = date('Y-m-d');
            $data->created_at            = $date;

            if ($data->save()) {
                // return redirect('/');
               return redirect('/')->with(['success' => 'Register berhasil! Silahkan login!']);
            }else{
                echo "Error";
            }
        }catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
        }
    }

    public function login_check(Request $req){
        // echo $req->username;

        $count = Member::where('username', $req->username)->count();
        echo $count;
        if ($count > 0) {
            $check = Member::where('username', $req->username)->where('password', md5($req->password))->first();
            if (!empty($check)) {
                Session::put('nama_member', $check->nama_member);
                Session::put('jenis_kelamin', $check->jenis_kelamin);
                Session::put('id', $check->id_member);
                Session::put('id_komunitas', $check->id_komunitas);


                // echo "id komunitas == ".Session::get('id_komunitas');
                // echo "<br>";
                // echo "nama == ".Session::get('nama');
                // echo "<br>";
                // echo "id member == ".Session::get('id');
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
        Session::forget('id');
        Session::forget('nama');
        Session::forget('id_komunitas');

        return redirect('login');

    }

    public function refreshCaptcha()

    {

        return response()->json(['captcha'=> captcha_img()]);

    }
}
