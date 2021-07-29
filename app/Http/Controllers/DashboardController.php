<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Member;
use App\Kegiatan;
use Session;
use DB;

class DashboardController extends Controller
{
    public function index(){

        // if (empty(Session::get('id_user'))) {
        //     return redirect('/');
        // }

        $count_member = Member::count();  
        $ultah_member = Member::where(DB::raw("DATE_FORMAT(tanggal_lahir,'%m-%d')"), date('m-d'))->get();
        $count_ultah_member = Member::where(DB::raw("DATE_FORMAT(tanggal_lahir,'%m-%d')"), date('m-d'))->count();
        $kegiatan = Kegiatan::where('status_kegiatan', 1)->count();
        $kegiatan_end = Kegiatan::where('status_kegiatan', 2)->count();
        return view('dashboard/index_dashboard',['member' => $count_member, 'ultah' => $ultah_member, 'kegiatan' => $kegiatan, 'selesai' => $kegiatan_end, 'count_ultah' => $count_ultah_member]);
    }
}
