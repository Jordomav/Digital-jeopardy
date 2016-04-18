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
                <textarea name="title"></textarea>
                <button type="submit">Create Category</button>
            </form>
        </div>
    </div>
    </body>

@endsection