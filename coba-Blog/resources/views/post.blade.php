@extends('layouts.main')
@section('container')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    
        <h1> {{$post["title"]}} </h1>
        <h5> {{$post["slug"]}} </h5>
        <p>By <a href="/posts?author={{$post->author->username}} "> {{$post->author->name}}</a> <span>.</span> <a href="/posts?category={{$post->category->slug}}"> {{$post->category->name}} </a></p>
        @if ($post->image)
        <div style="max-height: 350px; overflow:hidden;">
          <img src="{{asset('storage/' . $post->image)}}" class="img-fluid" alt="...">   
        </div>
        @else
        <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="img-fluid" alt="...">
        @endif
        <article class="mt-4">{!! $post->body !!}</article>
        <a href="/posts">Back to Post</a>
        </div>
    </div>
</div>
 

@endsection