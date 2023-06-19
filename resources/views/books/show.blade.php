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
                        <h1 class="mb-3 text-center mt-3">{{ $book->title }}</h1>
                        <p class="text-justify text-center">
                              By. <a href="/posts?author={{ $book->author->username }}" class="text-decoration-none">{{ $book->author->name }}</a> in 
                              <a href="/books?category={{ $book->category->slug }}" class="text-decoration-none">{{ $book->category->name }}</a>
                        </p>
                        <img src="https://source.unsplash.com/1200x400?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}" class="img-fluid">
                        
                        <article class="my-3 fs-4">
                              <p style="text-align: justify;"> {{ $book->sinopsis }} </p>
                        </article>
                        
                        <a href="/books" class="text-decoration-none">Back to Books</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection