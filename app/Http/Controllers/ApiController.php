<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DB;

class ApiController extends Controller
{

    public function get_bayar(){

        $bayar = DB::table('tbl_bayar')
            ->select('created_at', DB::raw('SUM(tbl_bayar.jumlah_bayar) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('created_at', 'DESC')
            ->get();

        return \Response::json($bayar);
    }
}
