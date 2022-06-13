@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Post</h1>
  </div>

  <div class="col-lg-8">
    <form action="/dashboard/posts" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" required value=" {{old('title')}} ">  
          @error('title')
              <div class="invalid-feedback"> {{$message}} </div>
          @enderror
          </div>

          <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" readonly value="{{old('slug')}}">
            @error('slug')
            <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-labe mb-2">Category</label>
            <select class="form-select" name="category_id">
              @foreach ($categories as $cat)
              @if (old('category_id') == $cat->id)
              <option value=" {{$cat->id}}" selected> {{$cat->name}} </option>
              @else
              <option value=" {{$cat->id}}"> {{$cat->name}} </option>
              @endif
              @endforeach   
            </select>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Post Image </label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImg()">
            @error('image')
            <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="body"> Body</label>
            @error('body')
                <p class="text-danger"> {{$message}} </p>
            @enderror
            <input id="body" type="hidden" name="body" value=" {{old('body')}} ">
            <trix-editor input="body"></trix-editor>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>

 
 

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
         e.preventDefault();
    });


    function previewImg() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }

    }


  </script>
@endsection

