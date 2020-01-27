<?php

namespace App;

use App\City;
use App\User;
use App\Business;
use App\Discount;
use Illuminate\Database\Eloquent\Model;

class DiscountView extends Model
{
    protected $table = 'discount_views';

    protected $fillable = [
    	'discount_id',
    	'user_id',
    	'business_id',
    	'city_id'
    ];

    protected $casts = [
    	'created_at' => 'datetime'
    ];

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
