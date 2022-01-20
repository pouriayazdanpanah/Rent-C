<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['user_id','commentable_id','commentable_type','parent_id','parent_id','comment','approved'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function commentable()
    {
        return $this->morphOne();
    }

    public function child()
    {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }

    public function is_approved(){
        return $this->approved == 1;
    }
}
