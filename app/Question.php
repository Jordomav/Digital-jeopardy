<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'answer'];
    public function categories() {
        return $this->belongsTo(Category::class);
    }

}
