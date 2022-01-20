<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   protected $fillable = ['user_id' ,'arrived_at' , 'departed_at','guests' , 'total_price'];

   public function user()
   {
       return $this->belongsTo(User::class);

   }

   public function product()
   {
       return $this->belongsToMany(Product::class);
   }



}
