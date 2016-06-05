<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Question;
use App\Game;
use DB;
use App;
use Illuminate\Contracts\Auth\Guard;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Guard $auth)
    {
        $games = $auth->user()->games;
        return view('admin.games.games', compact('games'));
    }

    public function store(Request $request, Game $game)
    {
        $category = new Category;
        $category->title = $request->title;
        $game->categories()->save($category);
        return redirect('show/'.$category->id);
    }

    public function show(Category $category)
    {
        return view('admin.categories.category', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function saveEdit(Category $category, Request $request)
    {
        $category->update(['title' => $request->title]);
        return redirect('/show/'.$category->_id);
    }

    public function delete(Category $category)
    {
        return view('admin.categories.delete', compact('category'));
    }

    public function confirmDelete(Category $category)
    {
        $category->delete();
        return redirect('/');
    }
}

