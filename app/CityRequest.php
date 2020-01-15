<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;

class CityRequest extends Model
{
    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
