@extends('layouts.app')

@section('content')

    <div data-ng-app="jeopardyApp" data-ng-controller="adminController as admin" class="container">

        <form method="POST" action="/save-edit/{{ $question->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <h3>Question Type:</h3>
                <span data-ng-click="admin.setQuestionType('text')" class="col-xs-2">Question</span>
                <span data-ng-click="admin.setQuestionType('image')" class="col-xs-2">Image</span>
            </div>

            <div data-ng-show="admin.getQuestionType('{{ $question }}') === 'text' ">
                <h3>Question:</h3>
                <textarea name="question" id="" cols="40" rows="5">{{ $question->question }}</textarea>
            </div>

            <div data-ng-show="admin.getQuestionType('{{ $question }}') === 'image' ">

                @if($question->image)
                    <img src="/img/{{ $question->image }}" alt="" style="width:300px;">
                @endif

                <label for="image">
                    Change image:
                    <input type="file" name="image" id="filename">
                </label>

            </div>

            <h3>Answer:</h3>
            <textarea name="answer" id="" cols="40" rows="5">{{ $question->answer }}</textarea>
            <button type="submit">Save</button>
        </form>


        <a href="/show/{{ $question->category->id }}">Cancel</a>

    </div>


@endsection