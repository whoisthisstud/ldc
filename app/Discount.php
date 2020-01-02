<?php

namespace App;

use App\City;
use App\State;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $guarded = [];

    protected $casts = [
        'expires' => 'datetime',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
