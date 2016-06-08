@extends('layouts.app')

@section('content')

    <div data-ng-app="jeopardyApp" data-ng-controller="adminController as admin" class="container">

        <form method="POST" action="/save-edit/{{ $question->id }}" enctype="multipart/form-data">

            <h3>Edit Question:</h3>

            {{ csrf_field() }}

            <div class="admin-input row">
                <span>Question Type:</span>
                <span data-ng-click="admin.setQuestionType('text')" class="option-link minor">Question</span>
                <span data-ng-click="admin.setQuestionType('image')" class="option-link minor">Image</span>
            </div>

            <div style="min-height: 80px">
                <div class="row" data-ng-show="admin.getQuestionType('{{ $question }}') === 'text' ">
                    <label for="question" class="col-xs-12">
                        Question:
                        <textarea class="col-xs-12" name="question">{{ $question->question }}</textarea>
                    </label>
                </div>

                <div class="admin-input" data-ng-show="admin.getQuestionType('{{ $question }}') === 'image' ">
                    @if($question->image)
                        <img src="/img/{{ $question->image }}" alt="" style="width:300px;">
                    @endif
                    <label for="image">
                        Change Image:
                        <input class="col-xs-12" type="file" name="image" id="filename" >
                    </label>
                </div>
            </div>

            <div class="row">
                <label for="answer" class="col-xs-12">
                    Answer:
                    <textarea class="col-xs-12" name="answer">{{ $question->answer }}</textarea>
                </label>
            </div>

            <button type="submit">Save Question</button>

        </form>


        <a href="/show/{{ $question->category->id }}">Cancel</a>

    </div>


@endsection