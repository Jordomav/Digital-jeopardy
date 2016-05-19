@extends('layouts.jeopardy')

@section('content')

    @if($currentUser)

    <div class="container buzzer-container" data-ng-app="jeopardyApp" data-ng-controller="buzzerController as buzzer">
        <button data-ng-click="buzzer.broadcastToAllPlayersInGame()"
                data-ng-disabled="buzzer.buttonDisabled('{{ $currentUser }}')"
                data-ng-class="buzzer.enabledness('{{ $currentUser }}')"
                class="buzzer"></button>
        
        <div style="color: white;">
            Debugging:
            <h3>@{{ buzzer.playerWhoBuzzed.name }}</h3>
        </div>
        
    </div>

    @endif

@endsection