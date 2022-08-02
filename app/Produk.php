<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $fillable =
    ['kode_produk', 'nama_produk', 'kategori_id', 'harga', 'stok', 'photo', 'keterangan',];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
