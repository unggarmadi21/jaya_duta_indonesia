<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Users;
use Session;

class UsersController extends Controller
{
    public function index(){

        if (empty(Session::get('nama_user'))) {
            return redirect('admin/login');
        }

        $users = Users::orderBy('created_at', 'DESC')->get();
    	return view('user/index_user', compact('users'));
    }

    public function insert(Request $req){

        $this->validate($req,[
            'nama_user'     => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'nama_foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username'      => 'required',
            'password'      => 'required',
        ]);


        $date = date('Y-m-d H:i:s');

        
        if ($req->hasFile('nama_foto')) {
            $destinationPath = public_path() .'/assets/images/';
            $files = $req->file('nama_foto'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder
        }



        try{
            $data = new Users; 

            $data->id_user          = uniqid();
            $data->nama_user        = $req->nama_user;
            $data->tempat_lahir     = $req->tempat_lahir;
            $data->tanggal_lahir    = $req->tanggal_lahir;
            $data->jenis_kelamin    = $req->jenis_kelamin;
            $data->alamat           = $req->alamat;
            $data->email            = $req->email;
            $data->no_telp          = $req->no_telp;
            $data->nama_foto        = $file_name;
            $data->username         = $req->username;
            $data->password         = md5($req->password);
            $data->role             = 1;
            $data->created_at       = $date;

            $data->save();
        }
        catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
        }

        return redirect('admin/user');
    }

    public function edit($id){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }
        
        $users = Users::where('id_user', $id)->first();

        return view('user/edit_user', ['data' => $users]);
    }

    public function update(Request $req, $id){

        $this->validate($req,[
            'nama_user'     => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'username'      => 'required',
        ]);
        
        $date = date('Y-m-d H:i:s');

        if ($req->nama_foto != null) {
            $data = Users::where('id_user', $id)->first();
            $image_path = public_path() .'/assets/images/'.$data->nama_foto; 
            echo $image_path; // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $destinationPath = public_path() .'/assets/images/';
            $files = $req->file('nama_foto'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder

            if ($req->password != null) {
                $data = array(
                    'nama_user' => $req->nama_user,
                    'tempat_lahir' => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat' => $req->alamat,
                    'email' => $req->email,
                    'no_telp' => $req->no_telp,
                    'nama_foto' => $file_name,
                    'password' => md5($req->password),
                    'updated_at' => $date,
                );
            }else{
                $data = array(
                    'nama_user' => $req->nama_user,
                    'tempat_lahir' => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat' => $req->alamat,
                    'email' => $req->email,
                    'no_telp' => $req->no_telp,
                    'nama_foto' => $file_name,
                    'updated_at' => $date,
                );
            }
            
        }else{
            if ($req->password != null) {
                $data = array(
                    'nama_user' => $req->nama_user,
                    'tempat_lahir' => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat' => $req->alamat,
                    'email' => $req->email,
                    'no_telp' => $req->no_telp,
                    'password' => md5($req->password),
                    'updated_at' => $date,
                );
            }else{
                $data = array(
                    'nama_user' => $req->nama_user,
                    'tempat_lahir' => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat' => $req->alamat,
                    'email' => $req->email,
                    'no_telp' => $req->no_telp,
                    'updated_at' => $date,
                );
            }
        }
        

        Users::where('id_user',$id)->update($data);

        return redirect('admin/user');
    }

    public function destroy($id)
    {
        $data = Users::where('id_user', $id)->first();
        $image_path = public_path() .'/assets/images/'.$data->nama_foto; 
        echo $image_path; // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Users::where('id_user', $id)->delete();

        return redirect('admin/user')->with('success', 'Data is successfully deleted');
    }
}
