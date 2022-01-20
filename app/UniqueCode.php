<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniqueCode extends Model
{
    protected $fillable = ['user_id','code','expired_at'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeVerifyCode($query,$code,$user)
    {
        return !! $user->uniqueCode()->where('code',$code)->where('expired_at','>',now())->first();
    }
    public function scopeGenerateCode($query , $user)
    {
        if ($code = $this->getAliveCode($user))
        {
           return $code = $code->code;
        }else{
            do {
                $code = mt_rand(100000, 999999);
            } while ($this->checkCodeIsUniq($user, $code));

            $user->uniqueCode()->create([
                'code' => $code,
                'expired_at' => now()->addMinutes(1)
            ]);
            return $code;
        }

    }
    private function checkCodeIsUniq($user,int $code)
    {
        return !! $user->uniqueCode()->whereCode($code)->first();
    }

    private function getAliveCode($user)
    {

        return $user->uniqueCode()->where('expired_at' , '>' , now())->first();
    }
}
