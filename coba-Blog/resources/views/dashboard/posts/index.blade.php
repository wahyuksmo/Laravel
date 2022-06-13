@extends('dashboard.layouts.main')
@section('container')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts, {{auth()->user()->name}} </h1>
</div>


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

<div class="table-responsive">
  <a href="/dashboard/posts/create" class="btn btn-sm btn-primary mb-3">Tambah Data</a>
  <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row"> {{$loop->iteration}} </th>
                <td> {{$post->title}} </td>
                <td> {{$post->category->name}} </td>
                <td>
                    <a href="/dashboard/posts/{{$post->slug}}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/posts/{{$post->slug}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/{{$post->slug}}" method="POST" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('yakin?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
              </tr>

            @endforeach
         
        
        </tbody>
      </table>
</div>




@endsection