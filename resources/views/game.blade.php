@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-2">
                    <div class="category">{{$category->title}}</div>
                    @foreach($category->questions as $index => $question)
                        <div class="value">${{$index+1*100}}</div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection