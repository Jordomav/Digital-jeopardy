<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Question extends Eloquent
{
    protected $fillable = ['question', 'answer'];
    public function categories() {
        return $this->belongsTo(Category::class);
    }

}
