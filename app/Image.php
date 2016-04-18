<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image', 'answer'];
    public function categories() {
        return $this->belongsTo(Category::class);
    }
}
