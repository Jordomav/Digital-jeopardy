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
        $category = Category::all();
        $image = Image::all();
        $question = Question::all();
        return view('index', compact('category', 'image', 'question'));
    }
}
