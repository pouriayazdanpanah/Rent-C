<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name','count_of_used'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * @param $query
     * @param $id
     */
    public function scopeCalculator($query , $id):void
    {
        $value = $this->find($id)->count_of_used;

        $value += 1;

        $this->find($id)->update(['count_of_used' => $value]);
    }
}
