<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Events\PlayerHitBuzzer;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use DateTime;
use Carbon\Carbon;


class BuzzerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function buzzer(Game $game, Guard $auth)
    {
        return view('gameplay.buzzer.buzzer')->with([
            'currentUser' => $auth->user(),
            'game' => $game
        ]);
    }

    public function buzz(Guard $auth, $joinCode)
    {
        // Broadcast the event to all other players
        $user = view()->share('user', $auth->user());
        $game = Game::where('join_code', $joinCode)->first();

        // Fire off event, pass along 'player' data -- we are including game_join_code with this to limit broadcast to
        // specific game.
        event(new PlayerHitBuzzer(
            [
                'name' => $user->name,
                'id' => $user->id,
                'game_join_code' => $joinCode
            ]
        ));

        // Update the last_buzz property of the user so that game host can check who buzzed first in the when multiple
        // players hit the buzzer around the same time.
//        $user->touch();
//        $user->last_buzz = $user->updated_at->createFromFormat('U.u', microtime(true))->format('m-d-Y Hisu');
//        $user->save();

    }
}
