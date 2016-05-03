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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories = Category::all();
        return view('categories.admin-categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->save();
        return redirect('/');
    }

    public function show(Category $category)
    {
        return view('categories.admin-category', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit-category', compact('category'));
    }

    public function saveEdit(Category $category, Request $request)
    {
        $category->update(['title' => $request->title]);
        return redirect('/show/'.$category->_id);
    }
}

