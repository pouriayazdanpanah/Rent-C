<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['favoriteable_id' , 'favoriteable_type' , 'favorite','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function Favoriteable()
    {
        return $this->morphTo();
    }
}
