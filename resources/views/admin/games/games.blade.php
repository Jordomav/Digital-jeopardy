@extends('layouts.app')
@section('content')
    <body style="background-color: white;">
    <div class="container">
        <div class="row">
            <h1>Welcome to Custom Jeopardy!</h1>
            <h3>Manage Games</h3>
            <div>
                @foreach($games as $game)
                    <p>
                        <a href="/edit-game/{{ $game->id }}">{{ $game->name }}</a>
                        <a href="/game-menu/{{ $game->id }}"><span class="option-link minor">Play</span></a>
                    </p>
                @endforeach
            </div>
            <form method="POST" action="add/new-game">

                {{ csrf_field() }}

                <div>
                    <label for="new-game">
                        Add Game
                        <input class="col-xs-12" type="text" name="name">
                    </label>
                </div>

                <button type="submit">Save</button>

            </form>
        </div>
    </div>
    </body>

@endsection