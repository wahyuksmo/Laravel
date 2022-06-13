@extends('layouts.main')
@section('container')


<h1 class="text-center mb-3"> {{$title}} </h1>

<div class="row mb-3 justify-content-center">
  <div class="col-md-6">
    <form action="/posts">
      @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">    
      @endif
      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">  
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari..." value="{{request('search')}} " name="search">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
<div class="card">
  
  @if ($posts[0]->image)
  <div style="max-height: 350px; overflow:hidden;">
    <img src="{{asset('storage/' . $posts[0]->image)}}" class="img-fluid">   
  </div>
  @else
  <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="img-fluid" alt="...">
  @endif
  
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
      <h5 class="card-title"> {{$posts[0]->title}} </h5>
      <p class="text-muted">By <a href="/posts?author={{$posts[0]->author->username}} "> {{$posts[0]->author->name}}</a></p>
      <p class="card-text"> {{$posts[0]->excerpt}} </p>
      <p class="card-text"><small class="text-muted"> {{$posts[0]->created_at->diffForHumans()}} </small></p>
      <a href="/posts/{{$posts[0]->slug}}">Read more.. </a>
    </div>
  </div>
    



<div class="container mt-5">
  <div class="row">

    @foreach ($posts as $post)
        
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute px-3 py-2 text-white" style="background-color:rgba(0,0,0,0.7);"><a href="/posts?category={{$post->category->slug}}" class="text-white text-decoration-none"> {{$post->category->name}} </a></div>
        @if ($post->image)
          <img src="{{asset('storage/' . $post->image)}}" class="img-fluid" alt="...">   
        @else
        <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="img-fluid mt-4" alt="...">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$post["title"]}}</h5>
          <p>By . <a href="/posts?author={{$post->author->username}} "> {{$post->author->name}}</a> <small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
          <p class="card-text">{{$post["excerpt"]}}</p>
          <a href="/posts/{{$post["slug"]}}" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>

    @endforeach
   

  </div>
</div>

@else
    <p class="text-center fs-4">No Post Found</p>
@endif


{{$posts->links()}}

@endsection