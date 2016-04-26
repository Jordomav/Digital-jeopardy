@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="main">Jeopardy!</h1>
    </div>
    <div class="row">
        <button class="start" data-ng-click="startGame()">PLAY</button>
    </div>


</div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--@foreach($categories as $category)--}}
                {{--<div class="col-lg-2 category">{{$category->title}}</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection