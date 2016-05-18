<?php

namespace App\Http\Controllers;

use App\Events\PlayerHitBuzzer;
use Illuminate\Http\Request;
use App\Category;
use App\Question;
use DB;
use Redis;

class GameController extends Controller
{

    public function menu()
    {
        return view('game.menu');
    }


    public function play()
    {
        return view('game.game');
    }

    public function pusherTest()
    {
        event(new PlayerHitBuzzer('Neil Strain'));
    }


    public function getGameData()
    {
        $categories = Category::all()->take(6);
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
