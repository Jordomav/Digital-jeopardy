<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Game extends Eloquent
{
    protected $fillable = ['name', 'users', 'categories', 'scores'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
