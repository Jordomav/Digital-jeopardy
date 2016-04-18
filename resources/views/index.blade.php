@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="main">Jeopardy!</h1>
    </div>
    <div class="row">
        <h4 class="start">PLAY</h4>
    </div>
</div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--@foreach($categories as $category)--}}
                {{--<div class="col-lg-2 category">{{$category->title}}</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<h1 class="question">Here is a question that has to do with the value</h1>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection