<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    
    public function buzzer(Guard $auth)
    {
        return view('buzzer.buzzer')->with('currentUser', $auth->user());
    }

    public function buzz(Guard $auth)
    {
        // Broadcast the event to all other players
        $user = view()->share('user', $auth->user());
        event(new PlayerHitBuzzer($user));

        // Update the last_buzz property of the user so that game host can check who buzzed first in the when multiple
        // players hit the buzzer around the same time.
//        $user->touch();
//        $user->last_buzz = $user->updated_at->createFromFormat('U.u', microtime(true))->format('m-d-Y Hisu');
//        $user->save();

    }
}
