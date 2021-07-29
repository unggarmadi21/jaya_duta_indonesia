<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    protected $table = 'tbl_posting';

    protected $fillable = [
        'id_user', 
    	'id_kegiatan', 
    	'foto_posting', 
    	'deskripsi', 
    	'created_at', 
    	'updated_at'
    ];

    public $timestamps = false;
}
