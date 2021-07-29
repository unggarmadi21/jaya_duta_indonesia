<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tbl_customer';

    protected $fillable = [
        'id_customer', 
    	'nama_customer', 
    	'jenis_kelamin', 
    	'tanggal_pembelian', 
    	'tanggal_service', 
    	'alamat', 
    	'email', 
    	'no_telp', 
    	'foto_customer',
    	'tipe_unit', 
    	'agen_sales', 
       
    ];

    public $timestamps = false;
}
