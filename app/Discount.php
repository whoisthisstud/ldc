<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $guarded = [];

    protected $casts = [
        'expires' => 'datetime',
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
