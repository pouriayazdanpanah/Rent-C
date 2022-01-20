<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var string[]
     */
    protected $fillable= ['formatted_address','route_name','neighbourhood','city','state','municipality_zone','place','lat','lng' ,'zip_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
