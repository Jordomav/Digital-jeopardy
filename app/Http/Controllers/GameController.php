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
        $game->join_code = $game->makeJoinCode();
        
        return view('gameplay.game.menu', compact('game'));
    }


    public function join(Request $request)
    {
        return json_encode($request->all());
    }


    public function play(Game $game)
    {
        $categories = $game->categories;
        return view('gameplay.game.game', compact('game', 'categories'));
    }


    public function getGameData(Game $game)
    {
        $categories = $game->categories;

        $questions = [];
        foreach($categories as $category) {
            array_push($questions, $category->questions);
        }

        return json_encode(['game' => $game]);
    }


    public function controller()
    {
        return view('game.game-controller');
    }
}
