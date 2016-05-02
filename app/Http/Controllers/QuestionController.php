<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use DB;
use App\Image;

class QuestionController extends Controller
{
    public function store(Category $category, Request $request)
    {

        $question = new Question;

        if ($request->file('image')) {
            $filename = random_int(100, 999);
            $question->image = $filename;
            $request->file('image')->move('img/', $filename);
            $question->answer = $request->answer;

        } else {
            $question->question = $request->question;
            $question->answer = $request->answer;
        }

        $category->questions()->save($question);
        return back();
    }

    public function edit(Question $question)
    {
        
    }


}
