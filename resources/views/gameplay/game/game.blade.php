@extends('layouts.jeopardy')
@section('content')

    <div class="container"
         data-ng-app="jeopardyApp"
         data-ng-controller="jeopardyController as game">


        <div data-ng-init="game.setGame('{{ $game->id }}')" class="row">

            {{ json_encode($game) }}

            {{ json_encode($categories) }}

            <div data-ng-repeat="category in game.categories" class="category col-xs-2">

                @{{ category.title }}

                <div data-ng-repeat="question in category.questions" class="value">
                    <a data-ng-click="game.selectQuestion(question)"
                       data-ng-hide="question.selected">
                        $@{{ question.money }}
                    </a>
                </div>

            </div>

        </div>

        {{-- Question Text Modal --}}
        <div data-ng-swipe-left="game.returnToGameboard()" class="custombox-modal-push" id="modal"
             tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div data-ng-click="game.toggleShowAnswer()" class="question modal-body">
                        <span data-ng-hide="game.selectedQuestion.showAnswer">
                            @{{ game.selectedQuestion.question }}
                        </span>

                        <img data-ng-if="game.selectedQuestion.image" src="img/@{{game.selectedQuestion.image}}"/>

                        <span data-ng-show="game.selectedQuestion.showAnswer">
                            @{{ game.selectedQuestion.answer }}
                        </span>

                    </div>
                    <button data-ng-click="game.returnToGameboard()" class="goBack"><i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection