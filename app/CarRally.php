<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarRally extends Model
{

    protected $guarded = [];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName() {
        return 'alias';
    }
}
