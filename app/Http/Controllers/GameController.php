<?php

namespace App\Http\Controllers;

use App\Events\PlayerHitBuzzer;
use Illuminate\Http\Request;
use App\Game;
use App\Category;
use App\Question;
use DB;
use Redis;
use Illuminate\Contracts\Auth\Guard;


class GameController extends Controller
{

    public function menu(Game $game)
    {
        $game->join_code = $game->makeJoinCode();
        $game->save();

        return view('gameplay.game.menu', compact('game'));
    }


    public function join(Request $request)
    {
        $game = Game::all()->where('join_code', $request->join_code)->first();

        return redirect('/buzzer/'.$game->id);
    }


    public function play(Game $game)
    {
        return view('gameplay.game.game', compact('game'));
    }


    public function getGameData(Game $game)
    {
        // Lazy eager load categories and questions to be embedded in the returned game object.
        $game->load(['categories' => function ($category) {
            $category->with('questions');
        }]);

        return json_encode(['game' => $game]);
    }


    public function controller()
    {
        return view('game.game-controller');
    }
}
