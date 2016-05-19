@extends('layouts.jeopardy')

@section('content')

    <div class="container buzzer-container" data-ng-app="jeopardyApp" data-ng-controller="buzzerController as buzzer">
        <button data-ng-click="buzzer.broadcastToAllPlayersInGame()" action="" class="buzzer"></button>
        
        <div style="color: white;">
            Debugging:
            @{{ pusher.buzzEvents }}
            <ul>
                <li data-ng-repeat="buzz in buzzer.buzzEvents">
                    @{{ buzz }}
                </li>
            </ul>
        </div>
        
    </div>



@endsection