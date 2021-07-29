<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// For User
// Route::get('/', 'LoginController@login');
Route::get('/refresh_captcha', 'LoginController@refreshCaptcha');
Route::post('/login/check', 'LoginController@login_check');
// Route::get('/admin', 'LoginController@index');

// Route::get('/dashboard', 'HomeController@index');
// Route::get('/dashboard', 'DashboardController@index');
// Route::get('/register', 'LoginController@add');
Route::get('/update_profile/{id}', 'HomeController@update_profile');
Route::post('/save_update_profile/{id}', 'HomeController@update');
Route::get('/partisipasi/{id}', 'HomeController@acara');
Route::post('/save_partisipasi', 'HomeController@insert_partisipasi');

// Route::get('/logout', 'LoginController@logout');

Route::post('/register/insert', 'LoginController@regis');
Route::get('/admin/register', 'LoginAdminController@add');
Route::get('/admin/regis', 'LoginAdminController@regis');
Route::get('admin/logout', 'LoginAdminController@logout');
Route::get('/', 'LoginAdminController@login');
// Route::post('/admin/login/check', 'LoginAdminController@login_check');

Route::get('/admin', 'DashboardController@index');

Route::get('/admin/member/add_member', 'MemberController@add');
Route::get('/admin/member', 'MemberController@index');
Route::post('/admin/member/insert_member', 'MemberController@insert');
Route::get('/admin/member/edit_member/{id}', 'MemberController@edit');
Route::post('/admin/member/update_member/{id}', 'MemberController@update');
Route::get('/admin/member/delete_member/{id}', 'MemberController@destroy');
Route::get('/admin/member/view_member/{id}', 'MemberController@view');
Route::get('/admin/member/kartu_member/{id}', 'MemberController@print_kartu');

Route::get('/admin/komunitas/add_komunitas', function () {

	if (empty(Session::get('id_user'))) {
     return redirect('admin/login');
  }

  return view('komunitas/add_komunitas');
});
Route::get('/admin/komunitas', 'KomunitasController@index');
Route::post('/admin/komunitas/insert_komunitas', 'KomunitasController@insert');
Route::get('/admin/komunitas/edit_komunitas/{id}', 'KomunitasController@edit');
Route::post('/admin/komunitas/update_komunitas/{id}', 'KomunitasController@update');
Route::get('/admin/komunitas/delete_komunitas/{id}', 'KomunitasController@destroy');

Route::get('/admin/user/add_user', function () {

	if (empty(Session::get('id_user'))) {
     return redirect('admin/login');
  }
  
    return view('user/add_user');
});

Route::get('/admin/user', 'UsersController@index');
Route::post('/admin/user/insert_user', 'UsersController@insert');
Route::get('/admin/user/edit_user/{id}', 'UsersController@edit');
Route::post('/admin/user/update_user/{id}', 'UsersController@update');
Route::get('/admin/user/delete_user/{id}', 'UsersController@destroy');

Route::get('/admin/kegiatan/add_kegiatan', 'KegiatanController@add');
Route::get('/admin/kegiatan', 'KegiatanController@index');
Route::post('/admin/kegiatan/insert_kegiatan', 'KegiatanController@insert');
Route::get('/admin/kegiatan/edit_kegiatan/{id}', 'KegiatanController@edit');
Route::get('/admin/kegiatan/view_kegiatan/{id}', 'KegiatanController@view');
Route::post('/admin/kegiatan/update_kegiatan/{id}', 'KegiatanController@update');
Route::post('/admin/kegiatan/update_status/{id}', 'KegiatanController@update_status');
Route::get('/admin/kegiatan/delete_kegiatan/{id}', 'KegiatanController@destroy');



Route::get('/admin/bayar', 'BayarController@index');
Route::get('/admin/bayar/add_bayar', 'BayarController@add');
Route::post('/admin/bayar/insert_bayar', 'BayarController@insert');
Route::get('/admin/bayar/edit_bayar/{id}', 'BayarController@edit');
Route::get('/admin/bayar/view_bayar/{id}', 'BayarController@view');
Route::post('/admin/bayar/update_bayar/{id}', 'BayarController@update');
Route::get('/admin/bayar/bayar_pdf/{id}', 'BayarController@cetak_pdf');

Route::get('/admin/posting', 'PostingController@index');
Route::get('/admin/posting/add_posting', 'PostingController@add');
Route::post('/admin/posting/insert_posting', 'PostingController@insert');
Route::get('/admin/posting/edit_posting/{id}', 'PostingController@edit');
Route::post('/admin/posting/update_posting/{id}', 'PostingController@update');
Route::get('/admin/posting/delete_posting/{id}', 'PostingController@destroy');

//API
Route::get('/admin/bayar/api_add_komunitas/{id}', 'BayarController@api_add');
Route::get('/admin/api/api_data_bayar', 'ApiController@get_bayar');



//pemasukan
Route::get('/admin/pemasukan', 'PemasukanController@index');
Route::get('/admin/pemasukan/add_pemasukan', 'PemasukanController@add');
Route::post('/admin/pemasukan/insert_pemasukan', 'PemasukanController@insert');
Route::get('/admin/pemasukan/export_excel', 'PemasukanController@export_excel');

//pengeluaran
Route::get('/admin/pengeluaran', 'PengeluaranController@index');
Route::get('/admin/pengeluaran/add_pengeluaran', 'PengeluaranController@add');
Route::post('/admin/pengeluaran/insert_pengeluaran', 'PengeluaranController@insert');
Route::get('/admin/pengeluaran/export_excel', 'PengeluaranController@export_excel');

//Laporan
Route::get('/admin/laporan', 'LaporanController@index');
Route::get('/admin/laporan/export_excel', 'LaporanController@export_excel');


// [your site path]/Http/routes.php
    Route::any('captcha-test', function() {
        if (request()->getMethod() == 'POST') {
            $rules = ['captcha' => 'required|captcha'];
            $validator = validator()->make(request()->all(), $rules);
            if ($validator->fails()) {
                echo '<p style="color: #ff0000;">Incorrect!</p>';
            } else {
                echo '<p style="color: #00ff30;">Matched :)</p>';
            }
        }
    
        $form = '<form method="post" action="captcha-test">';
        $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        $form .= '<p>' . captcha_img() . '</p>';
        $form .= '<p><input type="text" name="captcha"></p>';
        $form .= '<p><button type="submit" name="check">Check</button></p>';
        $form .= '</form>';
        return $form;
    });
