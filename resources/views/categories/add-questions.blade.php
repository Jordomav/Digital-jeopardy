@extends('layouts.app')
@section('content')

    <div data-ng-app="jeopardyApp" data-ng-controller="adminController as admin" class="container">

        <h1>{{ $category->title }}</h1>
        <h3>Create only a total of 5 questions per category</h3>

        {{-- Display current questions in category --}}
        @if(count($category->questions) > 0)
            @foreach($category->questions as $index=>$question)
                <div class="question-admin row">

                    @if($question->hasQuestionText())
                        <p class="col-xs-6">{{($index + 1).'. '.$question->question }}</p>
                    @endif

                    @if($question->hasImage())
                        <div class="col-xs-6">
                            {{($index + 1).'. '}}<img src="/img/{{ $question->image }}" alt="" style="width:300px;">
                        </div>
                    @endif

                    <p class="col-xs-12">Answer: {{ $question->answer }}</p>

                    {{-- Edit and Delete links --}}
                    <div class="col-xs-12">
                        <span><a href="/edit/{{ $question->_id }}">Edit</a></span>
                        <span><a href="/remove-from-category/{{ $category->id }}/{{ $question->_id }}">Remove</a></span>
                    </div>



                    <div class="col-xs-12"> <hr/>
                    </div>

                </div>
            @endforeach
        @endif

        <hr/>

        {{-- Add new questions to category --}}
        <form method="POST" action="/add/{{ $category->id }}/new" enctype="multipart/form-data">

            {{ csrf_field() }}

            <h2>Add a question to this category:</h2>

            <div class="row">
                <h3>Question Type:</h3>
                <span data-ng-click="admin.setQuestionType('text')" class="col-xs-2">Question</span>
                <span data-ng-click="admin.setQuestionType('image')" class="col-xs-2">Image</span>
            </div>

            <div data-ng-show="admin.getQuestionType() === 'text' ">
                <h3>Question:</h3>
                <textarea name="question" id="" cols="40" rows="5"></textarea>
            </div>

            <div data-ng-show="admin.getQuestionType() === 'image' ">
                <h3>Image:</h3>
                <input type="file" name="image" id="filename" >
            </div>

            <h3>Answer:</h3>
            <textarea name="answer" id="" cols="40" rows="5"></textarea>
            <button type="submit">Save Question</button>

        </form>


        <a href="/">Go back</a>
        <br><br>
    </div>

@endsection