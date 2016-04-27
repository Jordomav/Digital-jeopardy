<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use DB;
use App\Image;

class GameController extends Controller
{
    public function index(){
        return view('index');
    }

    public function show(Question $question, Category $category){
        $categories = Category::all()->take(6);
        $questions = Question::all()->where('category_id', $category->id)->take(5);
        return view('game', compact('categories', 'questions', 'question'));
    }
}
