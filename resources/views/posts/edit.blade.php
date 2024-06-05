@extends('layout')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content">{{ $post->content }}</textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Submit</button>
    </form>
@endsection
