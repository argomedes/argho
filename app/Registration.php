<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $guarded = [];

    public function carRally()
    {
        return $this->belongsTo(CarRally::class);
    }
}
