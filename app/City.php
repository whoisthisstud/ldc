<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function getState() {
    	return $this->belongsTo(State::class, 'state_id');
    }

    public function getDiscounts() {
    	return $this->hasMany(Discount::class);
    }
}
