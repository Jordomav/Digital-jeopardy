<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Category extends Eloquent
{
    protected $fillable = ['title', 'questions'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

}
