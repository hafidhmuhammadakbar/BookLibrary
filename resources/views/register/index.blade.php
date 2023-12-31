@extends('layouts.app')

@section('content')
   <div class="row d-flex justify-content-center">
      <div class="col-md-6">
         @if(session()->has('error'))
         <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
         <main class="form-registration w-100 m-auto">
            <h1 class="h3 mb-3 mt-5 fw-normal text-center">Please {{ $title }}</h1>
            <form action="/register" method="POST">
               @csrf
               <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required value="{{ old('name') }}" autofocus>
                  <label for="name">Name</label>
                  @error('name')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
                  <label for="username">Username</label>
                  @error('username')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>      
               <div class="form-floating mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  @error('email')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <div class="form-floating mb-3">
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Phone" required value="{{ old('phone') }}">
                  <label for="phone">Phone number</label>
                  @error('phone')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <div class="form-floating mb-3">
                  <select class="form-select" id="role" aria-label="Floating label select example" name="role">
                     <option disabled>Select your role</option>
                     <option value="writer" @if(old('role') === 'writer') selected @endif>Writer</option>
                     <option value="reader" @if(old('role') === 'reader') selected @endif>Reader</option>
                  </select>
                  <label for="role">Role</label>
                  @error('role')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <div class="form-floating mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  @error('password')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               
               <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login Now</a></small>
         </main>
      </div>
   </div>
   
@endsection
