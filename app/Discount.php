<?php

namespace App;

use App\City;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $guarded = [];

    protected $casts = [
        'begins_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }

    public static function inSeason($city)
    {
        $discounts = Discount::where('city_id',$city->id)
            ->where('begins_at','<=',now())
            ->where('expires_at','>',now())
            ->take(15)
            ->get();

        return $discounts;

        // return $this->where('begins_at','<=',now())
        //     ->where('expires_at','>',now());
    }
}
