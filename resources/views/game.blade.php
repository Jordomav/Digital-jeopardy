@extends('layouts.app')
@section('content')
    <div class="container" data-ng-app="jeopardyApp" data-ng-controller="jeopardyController as game">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-xs-2">
                    <div class="category">{{$category->title}}</div>
                    @foreach($category->questions->slice(0, 5) as $index => $question)
                        <div class="value"><a href="/display/{{$category->id}}/{{$question->id}}" >${{($index+1)*100}}</a></div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

@endsection