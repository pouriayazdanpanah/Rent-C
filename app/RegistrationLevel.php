<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationLevel extends Model
{
    protected $fillable = ['registration_level' , 'passed'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
