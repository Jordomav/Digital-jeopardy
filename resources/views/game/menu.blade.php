@extends('layouts.jeopardy')
@section('content')
<div class="container" data-ng-app="jeopardyApp" data-ng-controller="playersController as players">
    <div class="row">
        <h1 class="main">Jeopardy!</h1>
    </div>
    <div class="row">
        <div class="start" ><a href="/play">PLAY</a></div>
    </div>
    <div class="players">
        <div data-ng-repeat="user in players.users">@{{user.name}}</div>
    </div>
</div>
@endsection