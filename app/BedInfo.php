<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedInfo extends Model
{
    protected $fillable = ['type_of_bed','number_of_bed','number_of_guests'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
