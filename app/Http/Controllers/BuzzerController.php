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
        $user = view()->share('user', $auth->user());
//        $user->touch();
        $now = DateTime::createFromFormat('U.u', microtime(true));
        $user->last_buzz = $now->format('m-d-Y Hisu');
        $user->save();
        event(new PlayerHitBuzzer($user));
    }
}
