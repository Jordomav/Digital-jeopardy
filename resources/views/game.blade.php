@extends('layouts.jeopardy')
@section('content')

    <div class="container" data-ng-app="jeopardyApp" data-ng-controller="jeopardyController as game">
        <div class="row">

            <div data-ng-repeat="category in game.categories" class="category col-xs-2">

                @{{ category.title }}

                <div data-ng-repeat="question in category.questions" class="value">
                    <a data-ng-click="game.selectQuestion(question)"
                       data-ng-hide="question.selected"
                       href="/display/@{{category._id}}/@{{question._id}}">
                        $@{{ question.money }}
                    </a>
                </div>

            </div>

        </div>
    </div>

@endsection