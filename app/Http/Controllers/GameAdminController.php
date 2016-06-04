<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use App\Game;
use App\Http\Requests;

class GameAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addGame(Guard $auth, Request $request)
    {
        $game = Game::create([
            'name' => $request->name
        ]);

        $auth->user()->games()->save($game);

        return redirect('/');
    }

}
