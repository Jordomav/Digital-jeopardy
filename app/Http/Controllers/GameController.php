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
        $categories = Category::all();
        $questions = Question::all();
        return view('index', compact('categories', 'images', 'questions'));
    }
}
