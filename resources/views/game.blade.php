@extends('layouts.jeopardy')
@section('content')
    <div class="container" data-ng-app="jeopardyApp" data-ng-controller="jeopardyController as game">
        <div class="row">
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
                </div>
            </div>
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


{{--@foreach($categories as $category)--}}
    {{--<div class="col-xs-2">--}}
        {{--<div class="category">{{$category->title}}</div>--}}
        {{--@foreach($category->questions->slice(0, 5) as $index => $question)--}}
            {{--<div class="value"><a href="/display/{{$category->id}}/{{$question->id}}">${{($index+1)*100}}</a></div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
{{--@endforeach--}}