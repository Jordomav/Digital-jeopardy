@extends('layouts.app')
@section('content')

    <div class="container">
        <form method="POST" action="/confirm-delete/{{ $category->_id }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <p>
                Are you sure you want to delete category:
                <span style="font-weight: bold;"> {{ $category->title }}</span>?
            </p>
            <p>*All questions in this category will be deleted! This action cannot be undone.</p>
            <button class="btn btn-danger" type="submit">Confirm</button>
            <div class="col-xs-12 admin-input">
                <a href="/show/{{ $category->_id }}">Go back</a>
            </div>
        </form>
    </div>

@endsection