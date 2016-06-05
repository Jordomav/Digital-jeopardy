@extends('layouts.jeopardy')

@section('content')

    @if($currentUser)

    <div class="container buzzer-container text-center" data-ng-app="jeopardyApp" data-ng-controller="buzzerController as buzzer"
         data-ng-init="buzzer.init('{{ $currentUser }}')">
        <button data-ng-click="buzzer.broadcastToAllPlayersInGame()"
                data-ng-disabled="buzzer.disableBuzzer()"
                data-ng-class="buzzer.enabledness()"
                class="buzzer"></button>
        
        <div style="color: white;">
            Debugging:
            <h3 data-ng-if="buzzer.firstPlayerWhoBuzzed">@{{ buzzer.firstPlayerWhoBuzzed }}</h3>
        </div>

        <button data-ng-click="buzzer.getFirstPlayerWhoBuzzedIn()">Get First</button>

        <div class="white-text">
            <span>@{{ buzzer.thisPlayer.name }}: </span>

            {{-- TODO: Display player score --}}
            <span>$@{{ buzzer.currentUserScore || 0 }}</span>
        </div>
        
    </div>

    @endif

@endsection