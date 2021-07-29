<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'tbl_kegiatan';

    protected $fillable = [
    	'id_user', 
    	'id_komunitas', 
    	'nama_kegiatan', 
    	'jenis_kegiatan', 
    	'tanggal_kegiatan', 
    	'jam_kegiatan', 
    	'pengisi_acara', 
    	'tempat_kegiatan',
    	'status_kegiatan',  
    	'created_at', 
    	'updated_at'
    ];

    public $timestamps = false;
}
