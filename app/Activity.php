<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
    protected $fillable =
    ['id_user', 'user', 'nama_kegiatan','jumlah'];
}
