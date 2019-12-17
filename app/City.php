<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function getState() {
    	return $this->belongsTo(State::class);
    }

    public function getStateAbbr() {
    	return $this->getState()->abbr;
    }

    public function getDiscounts() {
    	return $this->hasMany(Discount::class);
    }
}
