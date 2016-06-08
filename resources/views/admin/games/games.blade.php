@extends('layouts.app')
@section('content')
    <body style="background-color: white;">
    <div class="container">
        <div class="row">

            <div class="col-xs-8"><h1>Welcome to Custom Jeopardy!</h1></div>

            <div class="col-xs-4 text-right">`
                <button class="btn btn-success" data-toggle="modal" data-target="#enterGameIdModal">
                    Join Game!
                </button>
            </div>

            <div class="col-xs-12">
                <h3>Your Games</h3>

                @foreach($games as $game)
                    <ul>
                        <li class="row" style="list-style: none;">
                            <a href="/edit-game/{{ $game->id }}" class="col-xs-2">{{ $game->name }}</a>
                            <a href="/game-menu/{{ $game->id }}" class="col-xs-2">
                                <span class="option-link minor">Play</span>
                            </a>
                        </li>
                    </ul>
                @endforeach
            </div>

            <div class="admin-form col-xs-12" style="margin-top: 30px;">
                <form method="POST" action="add/new-game">

                    {{ csrf_field() }}

                    <div class="form-group col-xs-4">
                        <label class="col-xs-12" for="name">
                            Add Game
                        </label>
                        <div class="col-xs-12">
                            <input type="text" name="name">
                            <button type="submit">Save</button>
                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>

    <!-- Enter Game ID Modal -->
    <div id="enterGameIdModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Join a Game</h4>
                </div>

                <form method="POST" action="/join" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <label for="game-id" class="col-xs-12">
                        Game ID
                    </label>
                    <div class="col-xs-12">
                        <input type="text" name="join_code">
                        <button type="submit" class="btn btn-success ">Join!</button>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>


    </body>

@endsection