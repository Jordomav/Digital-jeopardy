@extends('layouts.jeopardy')

@section('content')

    @if($currentUser)

    <div class="container buzzer-container text-center" data-ng-app="jeopardyApp" data-ng-controller="buzzerController as buzzer"
         data-ng-init="buzzer.init('{{ $currentUser }}', '{{ $game->join_code }}')">
        <h2 class="white-text">{{ $game->name.' Jeopardy'}}</h2>
        <button data-ng-click="buzzer.broadcastToAllPlayersInGame()"
                data-ng-disabled="buzzer.toggleBuzzerDisabledness()"
                data-ng-class="buzzer.enabledness()"
                class="buzzer-enabled"></button>

        <div class="white-text">
            <span>@{{ buzzer.thisPlayer.name }}: </span>

            {{-- TODO: Display player score --}}
            <span>$@{{ buzzer.currentUserScore || 0 }}</span>
        </div>
        
    </div>

    @endif

@endsection