<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function categories() {
        return $this->belongsTo(Category::class);
    }

}
