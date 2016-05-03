<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Question extends Eloquent
{
    protected $fillable = ['question', 'answer', 'category_id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function hasQuestionText()
    {
        return isset($this['question']);
    }

    public function hasImage()
    {
        return isset($this['image']);
    }
}
