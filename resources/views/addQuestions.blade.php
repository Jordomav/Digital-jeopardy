@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>{{$category->title}}</h1>
            @foreach($category->question as $question )
                Question:{{$question->question}}
                Answer:{{$question->answer}}
            @endforeach
            <form action="add/{{$category->id}}/new">
                <h3>Question:</h3>
                <textarea name="question" id="" cols="40" rows="5"></textarea>
                <h3>Answer:</h3>
                <textarea name="answer" id="" cols="40" rows="5"></textarea>
                <button type="submit">Submit Question</button>
            </form>
        </div>
    </div>
@endsection