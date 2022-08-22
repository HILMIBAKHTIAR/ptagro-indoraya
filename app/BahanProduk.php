<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahanProduk extends Model
{
    //
    protected $fillable =
    [
        'produk_id',
        'stock_id',
        'qty',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
