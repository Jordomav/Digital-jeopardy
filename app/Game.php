<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Game extends Eloquent
{
    protected $fillable = ['admin', 'name', 'users', 'categories', 'scores'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function makeJoinCode()
    {
        $name = strtolower(str_replace(' ', '-', $this->name)).'-'.str_random(6).'jeopardy.app';
        return $name;
    }
}
