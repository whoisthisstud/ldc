<?php

namespace App;

use App\User;
use App\State;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class City extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function businesses()
    {
        return $this->hasManyThrough(
            Business::class,
            Discount::class,
            'city_id',
            'id',
            'id',
            'business_id'
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function registerMediaCollections(Media $media = null)
    {
        // Define Collection and limit to a single image
        $this->addMediaCollection('city-images')
            ->singleFile()
            ->useFallbackUrl('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg')
            ->useDisk('cityImages');

        // Add a thumbnail conversion
        $this->addMediaConversion('thumb')
            ->width(350)
            ->height(350)
            ->sharpen(10);

        // Add a desktop banner conversion
        $this->addMediaConversion('d-banner')
            ->width(1400)
            ->height(500)
            ->sharpen(10);

        // Add a mobile banner conversion
        $this->addMediaConversion('m-banner')
            ->width(500)
            ->height(1000)
            ->sharpen(10);
    }

}
