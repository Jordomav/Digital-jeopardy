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

    public function buzz(Guard $auth)
    {
        // Broadcast the event to all other players
        $user = view()->share('user', $auth->user());
        event(new PlayerHitBuzzer([ 'name' => $user->name, 'id' => $user->id ]));

        // Update the last_buzz property of the user so that game host can check who buzzed first in the when multiple
        // players hit the buzzer around the same time.
//        $user->touch();
//        $user->last_buzz = $user->updated_at->createFromFormat('U.u', microtime(true))->format('m-d-Y Hisu');
//        $user->save();

    }
}
