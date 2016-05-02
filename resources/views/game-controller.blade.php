@extends('layouts.jeopardy')
@section('content')
<div class="container" data-ng-app="jeopardyApp" data-ng-controller="jeopardyController">
        <div class="col-xs-2">
            <div>
                <h1 class="user-name">Username</h1>
            </div>
            <button class="buzzer" data-ng-click="buttonClick()">Press Me</button>
            <div>
                <h1 class="score">$1000</h1>
            </div>
        </div>
</div>
@endsection