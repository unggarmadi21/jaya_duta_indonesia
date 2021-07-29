<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use App\Member;
use App\Customer;
use App\Komunitas;
use Session;

class MemberController extends Controller
{
    public function index(){

        // if (empty(Session::get('id_user'))) {
        //     return redirect('admin/login');
        // }

        // $member = Member::orderBy('created_at', 'DESC')->get();
    	// return view('member/index_member', compact('member'));

        
        $member = Customer::orderBy('id_customer', 'DESC')->get();
    	return view('member/index_member', compact('member'));
    }

    public function add(){

        // if (empty(Session::get('id_user'))) {
        //     return redirect('admin/login');
        // }

        $komunitas = Komunitas::first();
        return view('member/add_member', compact('komunitas'));
    }

    public function insert(Request $req){

         $this->validate($req,[
            'nama_customer'   => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_pembelian' => 'required',
            'tanggal_service'  => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'foto_customer'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tipe_unit'      => 'required',
            'agen_sales'      => 'required',

            // 'nama_customer'   => 'required',
            // 'jenis_kelamin' => 'required',
            // 'tanggal_pembelian' => 'required',
            // 'tanggal_service'  => 'required',
            // 'alamat'        => 'required',
            // 'email'         => 'required',
            // 'no_telp'       => 'required',
            // 'foto_customer'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'tipe_unit'      => 'required',
            // 'agen_sales'      => 'required',
            // 'nama_mobil'    => 'required',
            // 'plat_mobil'    => 'required',
            // 'nomor_id'      => 'required',
            // 'id_sosmed'     => 'required',
        ]);

        $date = date('Y-m-d H:i:s');

        if ($req->hasFile('foto_customer')) {
            $destinationPath = public_path() .'/assets/images/foto_customer/';
            $files = $req->file('foto_customer'); // will get all files

            $file_name = time() . '.' .$files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder
        }

        try{
            $data = new Customer; 
            //  $data = new Member; 

            $data->id_customer            = uniqid(); 
            $data->nama_customer          = $req->nama_customer;
            $data->jenis_kelamin          = $req->jenis_kelamin; 
            $data->tanggal_pembelian      = $req->tanggal_pembelian;
            $data->tanggal_service        = $req->tanggal_service;  
            $data->alamat                 = $req->alamat; 
            $data->email                  = $req->email; 
            $data->no_telp                = $req->no_telp; 
            $data->foto_customer          = $file_name;
            $data->tipe_unit              = $req->tipe_unit; 
            $data->agen_sales             = $req->agen_sales;

            // $data->id_member            = uniqid();
            // $data->id_komunitas         = $req->komunitas;
            // $data->nama_customer          = $req->nama_customer;
            // $data->jenis_kelamin        = $req->jenis_kelamin;
            // $data->tanggal_pembelian      = $req->tanggal_pembelian;
            // $data->tanggal_service        = $req->tanggal_service;
            // $data->alamat                 = $req->alamat;
            // $data->email                  = $req->email;   
            // $data->no_telp              = $req->no_telp;
            // $data->nama_foto            = $file_name;
            // $data->tipe_unit              = $req->tipe_unit; 
            // $data->agen_sales             = $req->agen_sales;


            // $data->nama_member          = $req->nama_member;
            // $data->tempat_lahir         = $req->tempat_lahir;
            // $data->tanggal_lahir        = $req->tanggal_lahir;        
            // $data->username             = $req->username;
            // $data->password             = md5($req->password);
            // $data->nama_mobil           = $req->nama_mobil;
            // $data->plat_mobil           = $req->plat_mobil;
            // $data->nomor_id             = $req->nomor_id;
            // $data->id_sosmed            = $req->id_sosmed;
            // $data->tanggal_bergabung    = date('Y-m-d');
            // $data->created_at           = $date;

            $data->save();
        }
        catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
           return redirect('admin/member/add_member')->with('error');
        }

        return redirect('admin/member');
    }

    public function edit($id){

        // if (empty(Session::get('id_user'))) {
        //     return redirect('admin/login');
        // }
        
        $member     = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', $id)->first();
        $komunitas  = Komunitas::where('id_komunitas', '!=', $member->id_komunitas)->get();

        return view('member/edit_member', ['data' => $member, 'komunitas' => $komunitas]);
    }

    public function update(Request $req, $id){

        $this->validate($req,[
            'nama_member'   => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'email'         => 'required',
            'no_telp'       => 'required',
            'username'      => 'required',
            'nama_mobil'    => 'required',
            'plat_mobil'    => 'required',
            'nomor_id'      => 'required',
            'id_sosmed'     => 'required',
        ]);

        $date = date('Y-m-d H:i:s');

        if ($req->nama_foto != null) {
            $data = Member::where('id_member', $id)->first();

            if ($data->nama_foto != null) {
                $image_path = public_path() .'/assets/images/member/'.$data->nama_foto; 
                echo $image_path; // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $destinationPath = public_path() .'/assets/images/member/';
            $files = $req->file('nama_foto'); // will get all files

            $file_name = time() . '.' .$files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder

            if ($req->password != null) {
                $data = array(
                    'nama_member'   => $req->nama_member,
                    'tempat_lahir'  => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat'        => $req->alamat,
                    'email'         => $req->email,
                    'no_telp'       => $req->no_telp,
                    'nama_foto'     => $file_name,
                    'password'      => md5($req->password),
                    'nama_mobil'    => $req->nama_mobil,
                    'plat_mobil'    => $req->plat_mobil,
                    'id_sosmed'     => $req->id_sosmed,
                    'nomor_id'      => $req->nomor_id,
                    'updated_at'    => $date,
                );
            }else{
                $data = array(
                    'nama_member'   => $req->nama_member,
                    'tempat_lahir'  => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat'        => $req->alamat,
                    'email'         => $req->email,
                    'no_telp'       => $req->no_telp,
                    'nama_foto'     => $file_name,
                    'nama_mobil'    => $req->nama_mobil,
                    'plat_mobil'    => $req->plat_mobil,
                    'id_sosmed'     => $req->id_sosmed,
                    'nomor_id'      => $req->nomor_id,
                    'updated_at'    => $date,
                );
            }
            
        }else{
            if ($req->password != null) {
                $data = array(
                    'nama_member'   => $req->nama_member,
                    'tempat_lahir'  => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat'        => $req->alamat,
                    'email'         => $req->email,
                    'no_telp'       => $req->no_telp,
                    'password'      => md5($req->password),
                    'nama_mobil'    => $req->nama_mobil,
                    'plat_mobil'    => $req->plat_mobil,
                    'id_sosmed'     => $req->id_sosmed,
                    'nomor_id'      => $req->nomor_id,
                    'updated_at'    => $date,
                );
            }else{
                $data = array(
                    'nama_member'   => $req->nama_member,
                    'tempat_lahir'  => $req->tempat_lahir,
                    'tanggal_lahir' => $req->tanggal_lahir,
                    'jenis_kelamin' => $req->jenis_kelamin,
                    'alamat'        => $req->alamat,
                    'email'         => $req->email,
                    'no_telp'       => $req->no_telp,
                    'nama_mobil'    => $req->nama_mobil,
                    'plat_mobil'    => $req->plat_mobil,
                    'id_sosmed'     => $req->id_sosmed,
                    'nomor_id'      => $req->nomor_id,
                    'updated_at'    => $date,
                );
            }
        }

        Member::where('id_member',$id)->update($data);

        return redirect('admin/member');
    }

    public function view($id){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }
        
        $member     = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', $id)->first();

        return view('member/view_member', ['data' => $member]);
    }

    public function print_kartu($id){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }
        
        $member     = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', $id)->first();

        return view('member/print_kartu_member', ['member' => $member]);
    }

    public function destroy($id)
    {

        Member::where('id_member', $id)->delete();

        return redirect('admin/member')->with('success', 'Data is successfully deleted');
    }
}
