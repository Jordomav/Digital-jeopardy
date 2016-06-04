<?php

namespace App\Http\Controllers;

use App\Events\PlayerHitBuzzer;
use Illuminate\Http\Request;
use App\Game;
use App\Category;
use App\Question;
use DB;
use Redis;

class GameController extends Controller
{

    public function menu(Game $game)
    {
        return view('game.menu', compact('game'));
    }


    public function play(Game $game)
    {
        return view('game.game', compact($game));
    }


    public function getGameData(Game $game)
    {
        $game->categories()->take(6);
        $questions = Question::all();

        return json_encode(array(
                'categories' => $categories,
                'questions' => $questions));
    }

    public function controller()
    {
        return view('game.game-controller');
    }
}
