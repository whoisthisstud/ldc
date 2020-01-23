<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function city()
    {
        return $this->belongsToMany(City::class);
    }
}
