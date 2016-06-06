@extends('layouts.jeopardy')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="main">{{ $game->name }} Jeopardy!</h1>
    </div>
    <div class="row">
        <div class="start" ><a href="/play/{{ $game->id }}">PLAY</a></div>
        <p class="white-text">Join Code: {{ $game->join_code }}</p>
    </div>
</div>
@endsection