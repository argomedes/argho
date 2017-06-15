<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function carRally()
    {
        return $this->belongsTo(CarRally::class);
    }
}
