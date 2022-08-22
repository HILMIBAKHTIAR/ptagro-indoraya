<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    //
    protected $fiillable = [
        'produk_id', 'stock_id','qty',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
