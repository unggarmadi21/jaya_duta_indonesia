<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;
use App\Member;
use App\Kegiatan;
use App\Komunitas;
use Session;

class KegiatanController extends Controller
{
    public function index(){

        // if (empty(Session::get('id_user'))) {
        //     return redirect('admin/login');
        // }

        $kegiatan = Kegiatan::orderBy('created_at', 'DESC')->get();
    	return view('kegiatan/index_kegiatan', compact('kegiatan'));
    }

    public function add(){

        // if (empty(Session::get('id_member'))) {
        //     return redirect('/');
        // }

        $komunitas = Komunitas::all();
        return view('kegiatan/add_kegiatan', ['komunitas' => $komunitas]);
    }

    public function insert(Request $req){

        $this->validate($req,[
            'komunitas'         => 'required',
            'nama_kegiatan'     => 'required',
            'jenis_kegiatan'    => 'required',
            'tanggal_kegiatan'  => 'required',
            'jam_kegiatan'      => 'required',
            'pengisi_acara'     => 'required',
            'tempat_kegiatan'   => 'required',
        ]);

        $date = date('Y-m-d H:i:s');

        try{
            $data = new Kegiatan; 

            $data->id_kegiatan      = uniqid();
            $data->id_komunitas     = $req->komunitas;
            $data->id_user          = Session::get('id_user');
            $data->nama_kegiatan    = $req->nama_kegiatan;
            $data->jenis_kegiatan   = $req->jenis_kegiatan;
            $data->tanggal_kegiatan = $req->tanggal_kegiatan;
            $data->jam_kegiatan     = $req->jam_kegiatan;
            $data->pengisi_acara    = $req->pengisi_acara;
            $data->tempat_kegiatan  = $req->tempat_kegiatan;
            $data->status_kegiatan  = 1;
            $data->created_at       = $date;

            $data->save();
        }
        catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
        }

        return redirect('admin/kegiatan');
    }

    public function edit($id){

        
        // if (empty(Session::get('id_user'))) {
        //     return redirect('admin/login');
        // }

        $kegiatan = DB::table('tbl_kegiatan')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->where('tbl_kegiatan.id_kegiatan', $id)->first();
        $komunitas = Komunitas::where('id_komunitas', '!=', $kegiatan->id_komunitas)->get();


        return view('kegiatan/edit_kegiatan', ['data' => $kegiatan, 'komunitas' => $komunitas]);
    }

    public function update(Request $req, $id){
        $date = date('Y-m-d H:i:s');

        $data = array(
            'id_komunitas'      => $req->komunitas,
            'id_user'           => Session::get('id_user'),
            'nama_kegiatan'     => $req->nama_kegiatan,
            'jenis_kegiatan'    => $req->jenis_kegiatan,
            'tanggal_kegiatan'  => $req->tanggal_kegiatan,
            'jam_kegiatan'      => $req->jam_kegiatan,
            'jam_kegiatan'      => $req->jam_kegiatan,
            'tempat_kegiatan'   => $req->tempat_kegiatan,
            'updated_at'        => $date,
        );
        
        Kegiatan::where('id_kegiatan',$id)->update($data);

        return redirect('admin/kegiatan');
    }

    public function view($id){

        
        // if (empty(Session::get('id_user'))) {
        //     return redirect('admin/login');
        // }

        $kegiatan = DB::table('tbl_kegiatan')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->where('tbl_kegiatan.id_kegiatan', $id)->first();

        $member = Member::where('id_komunitas', $kegiatan->id_komunitas)->orderBy('nama_member', 'ASC')->get();


        return view('kegiatan/view_kegiatan', ['data' => $kegiatan, 'member' => $member]);
    }

    public function update_status(Request $req, $id){
        $date = date('Y-m-d H:i:s');

        $data = array(
            'status_kegiatan'   => $req->update_status,
            'updated_at'        => $date,
        );
        
        Kegiatan::where('id_kegiatan',$id)->update($data);

        return redirect('admin/kegiatan');
    }

    public function destroy($id)
    {
        Kegiatan::where('id_kegiatan', $id)->delete();

        return redirect('admin/kegiatan')->with('success', 'Data is successfully deleted');
    }
}
