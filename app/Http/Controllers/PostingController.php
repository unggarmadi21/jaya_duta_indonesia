<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Posting;
use App\Kegiatan;
use DB;
use Session;
use Response;
use DateTime;

class PostingController extends Controller
{
    public function index(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }
        
        $posting = DB::table('tbl_posting')
            ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_posting.id_kegiatan')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->orderBy('tbl_posting.created_at', 'DESC')
            ->get();
        return view('posting/index_posting', compact('posting'));
    }

    public function add(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        $kegiatan = Kegiatan::where('status_kegiatan', 2)->orderBy('created_at', 'DESC')->get();
        return view('posting/add_posting', ['kegiatan' => $kegiatan]);
    }

    public function api_add($id){

        $kegiatan = DB::table('tbl_kegiatan')
            ->select('komunitas.nama_komunitas')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->where('tbl_kegiatan.id_kegiatan', $id)->first();

        return \Response::json($kegiatan);
    }

    public function insert(Request $req){

        $this->validate($req,[
            'kegiatan'      => 'required',
            'foto_kegiatan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'     => 'required',
        ]);


        $date = date('Y-m-d H:i:s');

        
        if ($req->hasFile('foto_kegiatan')) {
            $destinationPath = public_path() .'/assets/images/postingan/';
            $files = $req->file('foto_kegiatan'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder
        }



        try{
            $data = new Posting; 

            $data->id_posting       = uniqid();
            $data->id_user          = Session::get('id_user');
            $data->id_kegiatan      = $req->kegiatan;
            $data->foto_posting     = $file_name;
            $data->deskripsi        = $req->deskripsi;
            $data->created_at       = $date;

            $data->save();
        }
        catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
        }

        return redirect('admin/posting');
    }

    public function edit($id){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }
        
        $posting = DB::table('tbl_posting')
            ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_posting.id_kegiatan')
            ->join('komunitas', 'komunitas.id_komunitas', '=', 'tbl_kegiatan.id_komunitas')
            ->where('tbl_posting.id_posting', $id)->first();

        $kegiatan = Kegiatan::where('status_kegiatan', 2)->orderBy('created_at', 'DESC')->get();
        // $member = Member::where('id_komunitas', $bayar->id_komunitas)->get();

        return view('posting/edit_posting', ['data' => $posting, 'kegiatan' => $kegiatan]);
    }

    public function update(Request $req, $id){

        $this->validate($req,[
            'kegiatan'      => 'required',
            'foto_kegiatan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi'     => 'required',
        ]);
        
        $date = date('Y-m-d H:i:s');

        if ($req->foto_kegiatan != null) {
            $data = Posting::where('id_posting', $id)->first();
            $image_path = public_path() .'/assets/images/postingan/'.$data->foto_posting; 
            echo $image_path; // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $destinationPath = public_path() .'/assets/images/postingan/';
            $files = $req->file('foto_kegiatan'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name
            $files->move($destinationPath , $file_name); // move files to destination folder

            
            $data = array(          
                'id_user'       => Session::get('id_user'),
                'id_kegiatan'   => $req->kegiatan,
                'foto_posting'  => $file_name,
                'deskripsi'     => $req->deskripsi,
                'updated_at'    => $date,
            );
            
        }else{
            $data = array(       
                'id_user'       => Session::get('id_user'),
                'id_kegiatan'   => $req->kegiatan,
                'deskripsi'     => $req->deskripsi,
                'updated_at'    => $date,
            );
        }
        

        Posting::where('id_posting',$id)->update($data);

        return redirect('admin/posting');
    }

    public function destroy($id)
    {
        $data = Posting::where('id_posting', $id)->first();
        $image_path = public_path() .'/assets/images/postingan/'.$data->foto_posting; 
        echo $image_path; // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Posting::where('id_posting', $id)->delete();

        return redirect('admin/posting')->with('success', 'Data is successfully deleted');
    }
}
