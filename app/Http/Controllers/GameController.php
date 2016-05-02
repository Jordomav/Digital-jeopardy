<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use DB;
use Redis;

class GameController extends Controller
{

    public function index()
    {
        return view('index');
    }


    public function play()
    {
        return view('game');
    }


    public function getGameData()
    {
        $categories = Category::all()->take(6);
        $questions = Question::all();

        return json_encode(array(
                'categories' => $categories,
                'questions' => $questions));
    }


    public function showQuestion(Category $category, $question_id)
    {
        $question = $category->questions()->where('_id', $question_id)->first();
        return view('question', compact('question'));
    }

    public function controller(){
        return view('game-controller');
    }
}
