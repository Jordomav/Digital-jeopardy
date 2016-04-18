<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Question;
use DB;
use App;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request){
        $category = new Category;
        $category->title = $request->title;
        $category->save();
        return redirect('/');
    }


    public function show(Category $category){
        return view('addQuestions', compact('category'));
    }
}
