@extends('layouts.app')
@section('content')
    <body style="background-color: white;">
    <div class="container">
        <div class="row">
            <h1>{{ $game->name }} Jeopardy</h1>

            <div>
                <h3>Categories:</h3>
                @foreach($categories as $category)
                    <p>
                        <a href="/show/{{ $category->id }}">{{ $category->title }}</a>
                        <span> ({{ count($category->questions) }} questions)</span>
                    </p>
                @endforeach
            </div>

            <form method="POST" action="/add/new-category/{{ $game->id }}">

                {{ csrf_field() }}

                <div>
                    <label for="new-category">
                        Add Category
                        <input class="col-xs-12" type="text" name="title">
                    </label>
                </div>

                <button type="submit">Save</button>

            </form>
        </div>
    </div>
    </body>

@endsection