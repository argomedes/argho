<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'car_rally_id', 'password', 'remember_token',
    ];

    public function carRallies()
    {
        return $this->belongsTo(CarRally::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function publishNote(Note $note)
    {
        $this->notes()->save($note);
    }
}
