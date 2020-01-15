<?php

namespace App;

use City;
use Illuminate\Database\Eloquent\Model;

class BusinessRequest extends Model
{
    protected $guarded = [];

    public function city () {
    	return $this->belongsTo(City::class);
    }
}
