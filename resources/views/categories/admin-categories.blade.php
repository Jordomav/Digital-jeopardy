@extends('layouts.app')
@section('content')
    <body style="background-color: white;">
    <div class="container">
        <div class="row">
            <h1>Create your Jeopardy game.</h1>
            <h2>Create 6 categories</h2>
            <div>
                @foreach($categories as $category)
                    <p><a href="/show/{{$category->id}}">{{$category->title}}</a></p>
                @endforeach
            </div>
            <form method="POST" action="add/new">

                {{ csrf_field() }}

                <div>
                    <label for="title">
                        Add Category
                        <textarea class="col-xs-12" name="title"></textarea>
                    </label>
                </div>

                <button type="submit">Save</button>

            </form>
        </div>
    </div>
    </body>

@endsection