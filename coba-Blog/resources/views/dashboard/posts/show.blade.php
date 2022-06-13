@extends('dashboard.layouts.main')
@section('container')

<div class="container mt-3 mb-5">
    <div class="row ">
        <div class="col-lg">
    
        <h1 class="mt-3 mb-4"> {{$post["title"]}} </h1>
        <a href="/dashboard/posts" class="btn btn-sm btn-outline-success"> <span data-feather="arrow-left"></span> Back to posts</a>
        <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-sm btn-outline-warning"> <span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/posts/{{$post->slug}}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin?')"><span data-feather="x-circle"></span>Delete</button>
          </form>

          @if ($post->image)
          <div style="max-height: 350px; overflow:hidden;">
            <img src="{{asset('storage/' . $post->image)}}" class="img-fluid mt-4" alt="...">   
          </div>
          @else
          <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="img-fluid mt-4" alt="...">
          @endif

       
        <article class="mt-4">{!! $post->body !!}</article>
        </div>
    </div>
</div>
 

@endsection