@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$category->title}}</h1>
            @foreach($category->questions as $question)
                <h3>Question:</h3><h4>{{$question->question}}</h4>
                <h3>Answer:</h3><h4>{{$question->answer}}</h4>
                <hr>
            @endforeach

            <form method="POST" action="/add/{{$category->id}}/new">
                {{ csrf_field() }}
                <h3>Question:</h3>
                <textarea name="question" id="" cols="40" rows="5"></textarea>
                <h3>Answer:</h3>
                <textarea name="answer" id="" cols="40" rows="5"></textarea>
                <button type="submit">Submit Question</button>
            </form>

            <h2>Or</h2>

            @foreach($category->images as $image)
                <h3>Image:</h3>
                <img src="/img/{{$image->image}}" alt="" style="width: 300px;">
                <h3>Answer:</h3><h4>{{$image->answer}}</h4>
            @endforeach
            <form method="POST" action="/add/{{$category->id}}/img" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Image:</h3>
                <input type="file" name="image" id="filename" >
                <h3>Answer:</h3>
                <textarea name="answer" id="" cols="40" rows="5"></textarea>
                <button type="submit">Submit Image Question</button>
            </form>
        </div>
        <a href="/">Go back</a>
        <br><br>
    </div>
@endsection