@extends('layouts.app')

@section('content')
   <div class="row d-flex justify-content-center">
      <div class="col-md-6">
         @if(session()->has('success'))
         <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
         <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 mt-5 fw-normal text-center">Please {{ $title }}</h1>
            <form action="/login" method="POST">
               @csrf      
               <div class="form-floating mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" autofocus value="{{ old('email') }}" required>
                  <label for="email">Email address</label>
                  @error('email')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <label for="password">Password</label>
               </div>
      
               {{-- <div class="form-check text-start my-3">
                  <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                     Remember me
                  </label>
               </div> --}}
               
               <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">No Registered? <a href="/register">Register Now</a></small>
         </main>
      </div>
   </div>
   
@endsection
