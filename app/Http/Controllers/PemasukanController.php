<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Keuangan;
use Session;
use App\Exports\PemasukanExport;
use Maatwebsite\Excel\Facades\Excel;

class PemasukanController extends Controller
{
    public function index(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        $pemasukan = Keuangan::where('status', 1)->orderBy('created_at', 'DESC')->get();
    	return view('pemasukan/index_pemasukan',['pemasukan' => $pemasukan]);
    }

    public function add(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        return view('pemasukan/add_pemasukan');
    }

    public function insert(Request $req){

        $this->validate($req,[
            'jumlah_pemasukan'  => 'required',
            'keterangan'        => 'required',
        ]);

        try{

            $data_saldo = Keuangan::latest()->first();

            $data = new Keuangan;

            $data->id_keuangan     = uniqid();
            $data->jumlah_uang      = $req->jumlah_pemasukan;
            $data->keterangan       = $req->keterangan;
            $data->status           = 1;
            $data->created_at       = date('Y-m-d H:i:s');

            if ($data_saldo) {
                $total = $data_saldo->saldo + $req->jumlah_pemasukan;
                $data->saldo = $total;
            }else{
                $data->saldo = $req->jumlah_pemasukan;
            }
            

            if ($data->save()) {

                return redirect('admin/pemasukan');
            }

        }catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
           return redirect('admin/pemasukan/add_pemasukan');
        }
    }

    public function export_excel(Request $req){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        return Excel::download(new PemasukanExport($req->sebelum,$req->sesudah), date('Y-m-d H:i:s').'_laporan.xlsx');
    }
}
