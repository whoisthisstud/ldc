<?php

namespace App;

use App\User;
use App\State;
use App\Season;
use App\BusinessRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class City extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    protected $casts = [
        'surrounding_zips' => 'json',
        'seasons.pivot.begins_on' => 'date:m-d-y'
    ];
    // protected $dateFormat = 'm-d-y';

    // protected $dates = [
    //     'seasons.pivot.begins_on'
    // ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function newDiscounts()
    {
        return $this->discounts()
            ->where('begins_at', '=', null)
            ->where('expires_at', '=', null);
    }

    public function availableDiscounts()
    {
        return $this->discounts()
            ->where('begins_at', '<=', now())
            ->where('expires_at', '>=', now());
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

    public function seasons()
    {
        return $this->belongsToMany(Season::class)
            ->withPivot(
                'begins_on',
                'ends_on',
                'filled'
            );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function requestedBusinesses()
    {
        return $this->hasMany(BusinessRequest::class);
    }

    public function registerMediaCollections(Media $media = null)
    {
        // Define Collection and limit to a single image
        $this->addMediaCollection('city-images')
            ->singleFile()
            ->useFallbackUrl('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg')
            ->useDisk('cityImages');

        // Define Collection and limit to a single image
        $this->addMediaCollection('city-cards')
            ->singleFile()
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

    public function setSurroundingCities()
    {
        $related_zips = $this->getSurroundingCitiesData();

        if (! $related_zips) {
            return false;
        }

        $this->surrounding_cities = $related_zips;
        $this->save();

        return true;
    }

    public function getSurroundingCitiesData()
    {
        $api_url = 'https://www.zipcodeapi.com/rest/' .
            config('dev.zip_code_api') .
            '/radius.json/' .
            $this->zip_code .
            '/10/mile';

        $response = file_get_contents('https://www.zipcodeapi.com/rest/' . $this->api . '/radius.json/' . $this->zip_code . '/10/mile');

        return $response;
    }
}
