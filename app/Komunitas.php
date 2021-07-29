<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    protected $table = 'komunitas';

    protected $fillable = ['id_komunitas', 'nama_komunitas'];

    public $timestamps = false;
}
