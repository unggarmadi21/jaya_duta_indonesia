<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Keuangan;
use Session;
use App\Exports\PengeluaranExport;
use Maatwebsite\Excel\Facades\Excel;

class PengeluaranController extends Controller
{
    public function index(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        $pengeluaran = Keuangan::where('status', 2)->orderBy('created_at', 'DESC')->get();
    	return view('pengeluaran/index_pengeluaran',['pengeluaran' => $pengeluaran]);
    }

    public function add(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        return view('pengeluaran/add_pengeluaran');
    }

    public function insert(Request $req){

        $this->validate($req,[
            'jumlah_pengeluaran'  => 'required',
            'keterangan'            => 'required',
        ]);

        try{

            $data_saldo = Keuangan::latest()->first();

            $data = new Keuangan;

            $data->id_keuangan      = uniqid();
            $data->jumlah_uang      = $req->jumlah_pengeluaran;
            $data->keterangan       = $req->keterangan;
            $data->status           = 2;
            $data->created_at       = date('Y-m-d H:i:s');

            if ($data_saldo) {
                $total = $data_saldo->saldo - $req->jumlah_pengeluaran;
                $data->saldo = $total;
            }else{
                $data->saldo = $req->jumlah_pengeluaran;
            }
            

            if ($data->save()) {

                return redirect('admin/pengeluaran');
            }

        }catch(\Exception $e){
           // do task when error
           echo $e->getMessage();   // insert query
           return redirect('admin/pengeluaran/add_pengeluaran');
        }

    }

    public function export_excel(Request $req){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        return Excel::download(new PengeluaranExport($req->sebelum,$req->sesudah), date('Y-m-d H:i:s').'_laporan.xlsx');
    }
}
