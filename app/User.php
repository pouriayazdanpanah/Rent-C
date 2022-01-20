<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name','email', 'password','phone','two_factor_type','is_admin','staff','is_host'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uniqueCode()
    {
        return $this->hasMany(UniqueCode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
       return $this->belongsToMany(Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @param $key
     * @return bool
     */
    public function twoFactor($key){
       return $this->two_factor_type ==$key;
    }

    /**
     * @return bool
     */
    public function twoStepVerificationOff()
    {
        return $this->two_factor_type !== 'off';
    }

    /**
     * @return bool
     */
    public function twoStepVerificationSMS()
    {
        return $this->two_factor_type === 'sms';
    }

    /**
     * @return bool
     */
    public function isExpectation()
    {
        return $this->two_factor_type === 'expectation';
    }

    /**
     * @return bool
     */
    public function isAdminUser()
    {
        return $this->is_admin === 1;
    }

    /**
     * @return bool
     */
    public function isStaffUser()
    {
        return $this->staff === 1;
    }

    public function isHostUser()
    {
        return $this->is_host === 1;
    }

    /**
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        $userPermission = $this->permissions;

        return $userPermission->contains('name' , $permission->name) || $this->hasRole($permission->roles) ;
    }

    /**
     * @param $roles
     * @return mixed
     */
    public function hasRole($roles)
    {
        return $roles->intersect($this->roles)->all();
    }

}
