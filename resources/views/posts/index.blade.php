@extends('layout')

@section('title', 'Posts')

@section('content')
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">River Tubing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('posts.index') }}">Posts</a></li>
      <li><a href="/">Halaman Website</a></li>

    </ul>
  </div>
</nav>

<section class="py-5 text-center container">
    <div class=" row py-lg 5">
        
        <h1 class="fw-light">Posts</h1>
        <p class="lead text-body-secondary">
        Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.
        </p>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
      
    </div>
</section>


    @if($posts->isEmpty()) 
        <p>No posts available.</p>
    @else
    <div class="album py-6 bg-body-tertiary">
        <div class="container">         
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    
    @foreach ($posts as $post)
               
                    <div class="col">
                        <div class=" card shadow-sm">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="200" height ="225"class="bd-placeholder-img card-img-top">
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                    </img>
                    @endif       

                    <div class="card-body">                    
                        <a  class ="card-text" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        <p class="card-text">{{ $post->content }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                    </div>
                    </div>

                        </div>
                    </div>
                
            @endforeach
            </div>
         </div>
    </div>

    @endif
@endsection
