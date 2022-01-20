<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingData extends Model
{
    protected $fillable = ['arrived_at','departed_at'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
