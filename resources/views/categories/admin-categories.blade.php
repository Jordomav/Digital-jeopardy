@extends('layouts.app')
@section('content')
    <body style="background-color: white;">
    <div class="container">
        <div class="row">
            <h1>Create your Jeopardy game.</h1>
            <h2>Create 6 categories</h2>
            <div>
                @foreach($categories as $category)
                    <p>
                        <a href="/show/{{ $category->id }}">{{ $category->title }}</a>
                        <span> ({{ count($category->questions) }} questions)</span>
                    </p>
                @endforeach
            </div>
            <form method="POST" action="add/new">

                {{ csrf_field() }}

                <div>
                    <label for="new-category">
                        Add Category
                        <input class="col-xs-12" type="text" name="title">
                    </label>
                </div>

                <button type="submit">Save</button>

            </form>

            <h1 id="power">0</h1>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sockjs-client/1.1.0/sockjs.min.js"></script>
    <script>
        var socket = io('http://192.168.10.10:3000');
        socket.on('test-channel:App\\Events\\Game', function(message) {
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
    </body>

@endsection