<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    protected $casts = [
        'contacted_on' => 'datetime',
        'resolved_on' => 'datetime'
    ];
}
