<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use DB;

class QuestionController extends Controller
{
    public function store(Category $category, Request $request){

        $question = new Question;
        $question->question = $request->question;
        $question->answer = $request->answer;
        $category->questions()->save($question);
        return back();
    }
}
