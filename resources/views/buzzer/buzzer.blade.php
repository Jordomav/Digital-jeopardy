@extends('layouts.jeopardy')

@section('content')

    <div class="container" data-ng-app="jeopardyApp" data-ng-controller="pusherController as pusher">
        <h1>Buzz Events</h1>
        @{{ pusher.buzzEvents }}
        <ul>
            <li data-ng-repeat="buzz in pusher.buzzEvents">
                @{{ buzz }}
            </li>
        </ul>
    </div>



@endsection