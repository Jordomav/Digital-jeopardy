@extends('layouts.jeopardy')
@section('content')
    <div class="container">
        <div class="row">
            <h1 class="question">
                {{$question->question}}
                @if($question->image)
                <img src="/img/{{$question->image}}" alt="" class="col-xs-9">
                @endif
            </h1>
        </div>
        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Show Answer</button>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container">
                    <h1>Answer-</h1>
                    <h1>{{$question->answer}}</h1>
                </div>

            </div>
        </div>
    </div>
@endsection