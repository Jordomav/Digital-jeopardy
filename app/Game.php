<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Game extends Eloquent
{
    protected $fillable = ['admin', 'name', 'users', 'categories', 'scores', 'join_code'];

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
        $name = strtolower(str_replace(' ', '-', $this->name));
        return preg_replace('/[^A-Za-z0-9\-]/', '', $name).'-'.str_random(6).'.jeopardy.app';
    }
}
