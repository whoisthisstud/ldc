<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            City::class
        );
    }
}
