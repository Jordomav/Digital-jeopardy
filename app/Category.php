<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Category extends Eloquent
{
    protected $fillable = ['title', 'questions'];

    public function questions()
    {
        return $this->embedsMany(Question::class);
    }

}
