<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'tbl_member';

    protected $fillable = [
        'id_komunitas', 
    	'nama_member', 
    	'tempat_lahir', 
    	'tanggal_lahir', 
    	'jenis_kelamin', 
    	'alamat', 
    	'email', 
    	'no_telp', 
    	'nama_foto',
    	'username', 
    	'password', 
        // 'nama_mobil', 
        // 'plat_mobil', 
        // 'warna_mobil', 
        'nomor_id',
        // 'id_sosmed',
        // 'tanggal_bergabung',
    	// 'created_at', 
    	// 'updated_at'
    ];

    public $timestamps = false;
}
