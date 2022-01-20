<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\True_;

class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['approved','title','slug','price','price_label','categories','description','number_of_bed','number_of_bathroom','features','number_of_room','number_of_guest','sqft','image_cover','view_count'];
    /**
     * @var mixed
     */
    private $user;

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeCalculator($query , $id):void
    {
        $value = $this->find($id)->view_count;

        $value += 1;

        $this->find($id)->update(['view_count' => $value]);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorite()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }


    public function registrationLevel()
    {
        return $this->hasOne(RegistrationLevel::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bedInfos()
    {
        return $this->hasMany(BedInfo::class);
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fees()
    {
        return $this->hasOne(Fee::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bookingDate()
    {
        return $this->hasOne(BookingData::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reservation()
    {
        return $this->belongsToMany(Reservation::class);
    }

    /**
     * @param $query
     * @return int|mixed
     */
    public function scopeViewCount($query)
    {
        $number_of_view_count = 0;
        foreach ($this->all() as $product)
        {
            $number_of_view_count += $product->view_count;
        }
        return $number_of_view_count;
    }

    /**
     * @return bool
     */
    public function ProductSituation()
    {
        if ($this->approved == 1){
           return true;
        }
    }

    public function isHost()
    {
        $product = $this->where('user_id',auth()->user()->id)->first();

        if (!is_null($product))
        {
            return true;
        }
        return false;
    }
}
