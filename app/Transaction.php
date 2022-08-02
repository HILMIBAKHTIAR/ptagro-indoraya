<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable =
    ['kode_transaksi', 'kode_produk', 'nama_produk', 'harga', 'jumlah', 'total_harga', 'total_produk', 'subtotal', 'diskon', 'total', 'bayar', 'kembali', 'id_kasir', 'kasir',];
}
