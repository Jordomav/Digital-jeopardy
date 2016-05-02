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

            // TODO: prevent duplicate image names / check if filename already being used.
            $filename = random_int(100, 99999);
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
        return view('questions.edit-question', compact('question'));
    }

    public function saveEdit(Question $question, Request $request)
    {
        if ($request->file('image')) {

            // If switching a text question to an image question, remove the question field entirely.
            if ($question->hasQuestionText()) {
                $question->unset('question');
            }

            // TODO: prevent duplicate image names / check if filename already being used.
            $filename = random_int(100, 99999);
            $question->image = $filename;
            $request->file('image')->move('img/', $filename);
            $question->answer = $request->answer;

        } else {
            
            if ($question->hasImage()) {
                $question->unset('image');
            }
            $question->question = $request->question;
            $question->answer = $request->answer;
        }

        $question->save();

        $category = $question->category;
        return redirect('show/'.$category->id);
    }

}

