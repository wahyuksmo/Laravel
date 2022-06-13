@extends('layouts.main')
@section('container')

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <main class="form-signin w-100 m-auto">
            <form method="post" action="/register">
               @csrf
              <h1 class="h3 mb-3 fw-normal text-center">Please Registrasi</h1>

              <div class="form-floating mt-4">
                <input type="text" class="form-control @error('name') is-invalid @enderror " id="floatingInput" name="name" placeholder="Name..." required value=" {{old('name')}} ">
                <label for="floatingInput">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-floating mt-4">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" name="username" placeholder="username..." value=" {{old('username')}} ">
                <label for="floatingInput">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
          
              <div class="form-floating mt-4">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value=" {{old('email')}} ">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-floating mt-4">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
              </div>
    
              <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Registrasi</button>
            </form>
            <small class="d-block text-center mt-4">Sudah Registrasi ? <a href="/login">Login</a></small>
          </main>
          
    </div>
</div>



@endsection
