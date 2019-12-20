<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function state() {
    	return $this->belongsTo(State::class, 'state_id');
    }

    public function discounts() {
    	return $this->hasMany(Discount::class);
    }
}
