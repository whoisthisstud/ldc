<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    public function getStateCities() {
    	return $this->hasMany(City::class);
    }
}
