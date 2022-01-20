<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Static_;

/**
 * Class Categorie
 * @package App.
 * @method Static Calculator(Integer $id)
 */
class Categorie extends Model
{
    protected $fillable = ['name','count_of_use'];

    /**
     * @param $query
     * @param $id
     */
    public function scopeCalculator($query,$id):void
    {
        $value = $this->find($id)->count_of_use;

        $value += 1;

        $this->find($id)->update(['count_of_use' => $value]);
    }
}
