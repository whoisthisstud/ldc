<?php

namespace App;

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

}
