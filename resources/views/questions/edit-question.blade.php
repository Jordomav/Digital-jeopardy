@extends('layouts.app')

@section('content')

    <div class="container">

        <form method="POST" action="/save-edit/{{ $question->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Question:</h3>
            <textarea name="question" id="" cols="40" rows="5">{{ $question->question }}</textarea>
            <h2>OR</h2>
            <h3>Image:</h3>
            <input type="file" name="image" id="filename" >
            <h3>Answer:</h3>
            <textarea name="answer" id="" cols="40" rows="5">{{ $question->answer }}</textarea>
            <button type="submit">Submit Question</button>
        </form>


        <a href="/show/{{ $question->category->id }}">Cancel</a>
        <br><br>

    </div>


@endsection