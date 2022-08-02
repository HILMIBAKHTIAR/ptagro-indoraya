<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acces extends Model
{
    //
    protected $fillable = [
        'user', 'kelola_akun', 'kelola_produk', 'transaksi', 'kelola_laporan',
    ];
}
