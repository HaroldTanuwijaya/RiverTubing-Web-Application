@extends('layout')

@section('content')
    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Submit</button>
        <a href="{{ route('posts.index') }}">Back</a>
    </form>
@endsection
