<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use App\Member;
use App\Komunitas;
use App\Kegiatan;
use App\Posting;
use App\Bayar;
use Session;

class HomeController extends Controller
{
    public function index(){

        if (empty(Session::get('id'))) {
            return redirect('login');
        }
        $member = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', Session::get('id'))->first();

        $komunitas  = Member::where('id_komunitas', Session::get('id_komunitas'))->count();
        $posting = DB::table('tbl_posting')
            ->select('tbl_user.nama_user', 'tbl_user.nama_foto', 'tbl_posting.foto_posting', 'tbl_posting.deskripsi', 'tbl_posting.created_at')
            ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_posting.id_kegiatan')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->join('tbl_user', 'tbl_user.id_user', '=', 'tbl_posting.id_user')
            ->where('komunitas.id_komunitas', Session::get('id_komunitas'))->orderBy('tbl_posting.created_at', 'DESC')->paginate(15);

        $kgt        = Kegiatan::where('id_komunitas', Session::get('id_komunitas'))
        ->where('tanggal_kegiatan', '<=', date('Y-m-d'))
        ->where('status_kegiatan', 1)
        ->get();

        
    	// return view('dashboard/index_dashboard', ['member' => $member, 'data' => $komunitas, 'kgt' => $kgt, 'posting' => $posting]);

    	return view('home/index_home', ['member' => $member, 'data' => $komunitas, 'kgt' => $kgt, 'posting' => $posting]);
    }

    public function update_profile($id){

        if (empty(Session::get('id'))) {
            return redirect('login');
        }
        $member = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', Session::get('id'))->first();
        $members = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', $id)->first();

        $komunitas  = Member::where('id_komunitas', Session::get('id_komunitas'))->count();

        $kgt        = Kegiatan::where('id_komunitas', Session::get('id_komunitas'))->where('status_kegiatan', 1)->get();

        return view('home/update_profile', ['member' => $member, 'komunitas' => $komunitas, 'data' => $members, 'kgt' => $kgt]);
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
        ]);
        
        $date = date('Y-m-d H:i:s');

        if ($req->nama_foto != null) {
            $this->validate($req,[
                'nama_foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
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

            $file_name = $files->getClientOriginalName(); //Get file original name
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
                    'updated_at'    => $date,
                );
            }
        }

        Member::where('id_member',$id)->update($data);

        return redirect('');
    }

    public function acara($id){

        if (empty(Session::get('id'))) {
            return redirect('login');
        }
        $member = DB::table('tbl_member')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_member.id_komunitas')
            ->where('tbl_member.id_member', Session::get('id'))->first();

        $komunitas  = Member::where('id_komunitas', Session::get('id_komunitas'))->count();
        $kegiatan = DB::table('tbl_kegiatan')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->where('tbl_kegiatan.id_kegiatan', $id)->first();

        $kgt        = Kegiatan::where('id_komunitas', Session::get('id_komunitas'))->where('status_kegiatan', 1)->get();

        return view('home/partisipasi_acara', ['member' => $member, 'komunitas' => $komunitas, 'data' => $kegiatan]);
    }

    public function insert_partisipasi(Request $req){

        $this->validate($req,[
            'kegiatan'      => 'required',
            'bukti_bayar'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'jumlah_bayar'  => 'required',
        ]);


        $date = date('Y-m-d H:i:s');

        
        if ($req->hasFile('bukti_bayar')) {
            $destinationPath = public_path() .'/assets/images/bukti_bayar/';
            $files = $req->file('bukti_bayar'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder
        }



        try{
            $data = new Bayar; 

            $data->id_bayar         = uniqid();
            $data->id_member        = Session::get('id');
            $data->id_kegiatan      = $req->kegiatan;
            $data->foto_bukti_bayar = $file_name;
            $data->jumlah_bayar     = $req->jumlah_bayar;
            $data->created_at       = $date;

            $data->save();
        }
        catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
        }

        return redirect('');
    }
}
