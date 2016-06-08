@extends('layouts.jeopardy')
@section('content')
<div class="container" data-ng-app="jeopardyApp" data-ng-controller="jeopardyController as game">
        <div class="col-xs-2">
            <div>
                <h1 class="user-name">Username</h1>
            </div>
            <div>
                <button class="buzzer" data-ng-click="game.buttonClick()"></button>
            </div>
            <div>
                <h1 class="white-text">$1000</h1>
            </div>
        </div>
</div>
@endsection