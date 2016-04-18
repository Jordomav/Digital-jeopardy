<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Image extends Eloquent
{
    protected $fillable = ['image', 'answer'];
    public function categories() {
        return $this->belongsTo(Category::class);
    }
}
