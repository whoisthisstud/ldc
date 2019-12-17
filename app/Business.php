<?php

namespace App;

use App\Discount;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];

    public function getDiscounts() {
    	return $this->hasMany(Discount::class);
    }
}
