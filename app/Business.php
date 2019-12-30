<?php

namespace App;

use App\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\Activitylog\Traits\LogsActivity;

class Business extends Model
{
	use SoftDeletes; //, LogsActivity;

    protected $guarded = [];

    public function discounts() 
    {
    	return $this->hasMany(Discount::class);
    }

    public function cities() 
    {

    }

    
}
