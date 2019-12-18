<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    public function getCities() {
    	return $this->hasMany(City::class);
    }
}
