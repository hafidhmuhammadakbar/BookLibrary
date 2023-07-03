@extends('layouts.app')

{{-- section --}}
@section('content')
   <div class="container-fluid py-4 px-5">
      <div class="row">
         <div class="col-12">
            <div class="card border shadow-xs mb-4">
               <div class="card-header border-bottom pb-0">
                  <div class="row d-flex ">
                     <div class="col-md-6">
                        <div class="d-sm-flex align-items-center mb-3">
                           <div>
                              <h3 class="font-weight-semibold text-lg mb-0">{{ $title }}</h3>
                              <p class="text-sm mb-sm-0">Detail's Book Page</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <div class="row justify-content-center mb-5">
                     <div class="col-md-8">
                        <h1 class="mb-3 text-center mt-3">{{ $mybook->title }}</h1>
                        <p class="text-justify text-center">
                              By. <a href="/mybooks?author={{ $mybook->author->username }}" class="text-decoration-none">{{ $mybook->author->name }}</a> in 
                              <a href="/mybooks?category={{ $mybook->category->slug }}" class="text-decoration-none">{{ $mybook->category->name }}</a>
                        </p>

                        @if ($mybook->images != null)
                           <img src="{{ asset('storage/' . $mybook->images) }}" class="card-img-top img-fluid" style="height: 400px; width: 1500px;" alt="{{ $mybook->category->name }}">
                        @else
                           <img src="https://source.unsplash.com/1200x400?{{ $mybook->category->name }}" class="card-img-top img-fluid" alt="{{ $mybook->category->name }}">
                        @endif
                        
                        <article class="my-3 fs-4">
                              <p style="text-align: justify;"> {{ $mybook->sinopsis }} </p>
                        </article>
                        
                        <a href="/mybooks" class="text-decoration-none">Back to mybooks</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection