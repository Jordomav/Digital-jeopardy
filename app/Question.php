<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Question extends Eloquent
{
    protected $fillable = ['question', 'answer'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function hasImage()
    {
        return isset($this['image']);
    }

    public function hasQuestionText()
    {
        return isset($this['question']);
    }
}
