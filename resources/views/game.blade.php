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


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" id="buttonClick" data-toggle="modal">
        Modal
    </button>

    <!-- Modal -->
    <div class="modal" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('buttonClick').addEventListener('click', function( e ) {
                Custombox.open({
                    target: '#modal',
                    effect: 'push'
                });
                e.preventDefault();
            });
        });
    </script>

@endsection