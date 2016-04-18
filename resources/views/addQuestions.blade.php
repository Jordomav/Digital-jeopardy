@extends('layouts.app')
@section('content')
    <body style="background-color: white;">
    <div class="container">
        <div class="row">
            <h1>{{$category->title}}</h1>
            <h3>Create only a total of 5 questions per category</h3>
            @foreach($category->questions as $question)
                @if($question->question)
                    <h3>Question:</h3><h4>{{$question->question}}</h4>
                @endif 
                @if($question->image)
                        <h3>Image:</h3><img src="/img/{{$question->image}}" alt="" style="width:300px;">
                @endif
                <h3>Answer:</h3><h4>{{$question->answer}}</h4>
                <hr>
            @endforeach


            <form method="POST" action="/add/{{$category->id}}/new" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Question:</h3>
                <textarea name="question" id="" cols="40" rows="5"></textarea>
                <h2>OR</h2>
                <h3>Image:</h3>
                <input type="file" name="image" id="filename" >
                <h3>Answer:</h3>
                <textarea name="answer" id="" cols="40" rows="5"></textarea>
                <button type="submit">Submit Question</button>
            </form>


        </div>
        <a href="/">Go back</a>
        <br><br>
    </div>
    </body>

@endsection