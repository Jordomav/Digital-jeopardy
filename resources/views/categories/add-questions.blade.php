@extends('layouts.app')
@section('content')

    <div data-ng-app="jeopardyApp" data-ng-controller="adminController as admin" class="container">

        <div class="row">
            <h1 class="col-xs-4">{{ $category->title }}</h1>
            <span class="col-xs-8 text-right">
                <span class="option-link major"><a href="/edit-category/{{ $category->id }}">Edit Title</a></span>
                <span class="option-link major"><a href="/delete-category/{{ $category->id }}">Delete Category</a></span>
            </span>
        </div>



        <h3>Create only a total of 5 questions per category</h3>

        {{-- Display current questions in category --}}
        @if(count($category->questions) > 0)
            @foreach($category->questions as $index=>$question)
                <div class="question row">

                    @if($question->hasQuestionText())
                        <p class="col-xs-6">{{($index + 1).'. '.$question->question }}</p>
                    @endif

                    @if($question->hasImage())
                        <div class="col-xs-6">
                            {{($index + 1).'. '}}<img src="/img/{{ $question->image }}" alt="" style="width:300px;">
                        </div>
                    @endif

                    <p class="col-xs-12">Answer: {{ $question->answer }}</p>

                    {{-- Edit and Remove links for individual questions --}}
                    <div class="col-xs-12 text-right">
                        <span class="option-link minor"><a href="/edit/{{ $question->_id }}">Edit</a></span>
                        <span class="option-link minor"><a href="/remove-from-category/{{ $category->id }}/{{ $question->_id }}">Remove</a></span>
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

            <div class="row">
                <h2>Add a question to this category:</h2>
            </div>

            <div class="admin-input row">
                <span>Question Type:</span>
                <span data-ng-click="admin.setQuestionType('text')" class="option-link minor">Question</span>
                <span data-ng-click="admin.setQuestionType('image')" class="option-link minor">Image</span>
            </div>

            <div style="height: 80px">
                <div class="row" data-ng-show="admin.getQuestionType() === 'text' ">
                    <label for="question" class="col-xs-12">
                        Question:
                        <textarea class="col-xs-12" name="question"></textarea>
                    </label>
                </div>

                <div class="admin-input" data-ng-show="admin.getQuestionType() === 'image' ">
                    <input class="col-xs-12" type="file" name="image" id="filename" >
                </div>
            </div>

            <div class="row">
                <label for="answer" class="col-xs-12">
                    Answer:
                    <textarea class="col-xs-12" name="answer"></textarea>
                </label>
            </div>

            <button type="submit">Save Question</button>

        </form>


        <a href="/">Go back</a>
        <br><br>
    </div>

@endsection