@extends('layouts.main')
@section('container')

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
     
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('loginError')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
        @endif
        
        <main class="form-signin w-100 m-auto">
            <form action="/login" method="POST">
              @csrf
              <h1 class="h3 mb-3 fw-normal text-center">Please  Login</h1>
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" 
                autofocus required value=" {{old('email')}} ">
                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="invalid-feedback"> {{$message}} </div>
                @enderror
              </div>
              <div class="form-floating mt-4">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                <label for="floatingPassword">Password</label>
              </div>
    
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-4">Belum Registrasi ? <a href="/register">Registrasi</a></small>
          </main>
          
    </div>
</div>



@endsection
