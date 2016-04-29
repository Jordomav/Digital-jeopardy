@extends('layouts.jeopardy')
@section('content')
    <div class="container" data-ng-app="jeopardyApp" data-ng-controller="jeopardyController as game">
        <div class="row">
            <div data-ng-repeat="categories in game.showCategories">
                <div class="col-xs-2">
                    <div class="category">@{{ game.category.title }}</div>
                    <div data-ng-repeat="categories.questions in game.showQuestions">
                        <div class="value">$@{{ ($index+1)*100 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--@foreach($categories as $category)--}}
    {{--<div class="col-xs-2">--}}
        {{--<div class="category">{{$category->title}}</div>--}}
        {{--@foreach($category->questions->slice(0, 5) as $index => $question)--}}
            {{--<div class="value"><a href="/display/{{$category->id}}/{{$question->id}}">${{($index+1)*100}}</a></div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
{{--@endforeach--}}