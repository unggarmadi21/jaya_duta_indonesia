<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'tbl_keuangan';

    protected $fillable = [
    	'keterangan', 
    	'jumlah_uang',
    	'status',
    	'saldo',
    	'created_at', 
    	'updated_at'
    ];

    public $timestamps = false;
}