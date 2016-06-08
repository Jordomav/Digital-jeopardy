@extends('layouts.app')
@section('content')

    <div class="container">
        <form method="POST" action="/save-category-edit/{{ $category->_id }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <label for="title" class="col-xs-12 admin-input">
                Edit Category Title:
                <input type="text" name="title" placeholder="{{ $category->title }}"
                       class="col-xs-12">
            </label>
            <button type="submit">Save</button>
            <div class="col-xs-12 admin-input">
                <a href="/show/{{ $category->_id }}">Go back</a>
            </div>
        </form>
    </div>

@endsection