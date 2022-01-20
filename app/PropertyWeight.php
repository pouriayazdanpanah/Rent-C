<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyWeight extends Model
{
    protected $fillable = ['property_name','property_weight','property_level'];

    public function scopeWeight($query,$propertyName)
    {
      $property = $this->where('property_name',$propertyName)->first();
      return $property->property_weight;
    }
}
