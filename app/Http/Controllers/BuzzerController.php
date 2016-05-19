<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\PlayerHitBuzzer;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;

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
        event(new PlayerHitBuzzer($user));
        return $user->name . ' hit the buzzer.';
    }
}
