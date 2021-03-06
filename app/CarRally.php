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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function getRouteKeyName() {
        return 'alias';
    }
}
