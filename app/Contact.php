<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];

    protected $casts = [
        'contacted_on' => 'datetime',
        'resolved_on' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
