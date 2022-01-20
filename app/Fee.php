<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['cleaning_fee' ,'city_fee' , 'security_deposit' , 'service_fees' , 'taxes'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
         return $this->belongsTo(Product::class);
    }

}
