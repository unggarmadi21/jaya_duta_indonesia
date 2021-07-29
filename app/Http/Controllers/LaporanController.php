<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Keuangan;
use Session;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        $laporan = Keuangan::orderBy('created_at', 'DESC')->get();
    	return view('laporan/index_laporan',['laporan' => $laporan]);
    }

    public function export_excel(Request $req){

        if (empty(Session::get('id_user'))) {
            return redirect('admin/login');
        }

        return Excel::download(new LaporanExport($req->sebelum,$req->sesudah), date('Y-m-d H:i:s').'_laporan.xlsx');
    }
}
