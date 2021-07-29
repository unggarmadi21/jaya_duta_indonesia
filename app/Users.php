<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'tbl_user';

    protected $fillable = [
    	'nama_user', 
    	'tempat_lahir', 
    	'tanggal_lahir', 
    	'jenis_kelamin', 
    	'alamat', 
    	'email', 
    	'no_telp', 
    	'nama_foto',
    	'username', 
    	'password', 
    	'role', 
    	'created_at', 
    	'updated_at'
    ];

    public $timestamps = false;
}
