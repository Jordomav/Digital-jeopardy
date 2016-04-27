<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Category extends Eloquent
{
    protected $fillable = ['title'];

    public function questions(){
        return $this->hasMany(Question::class);
    }

}
