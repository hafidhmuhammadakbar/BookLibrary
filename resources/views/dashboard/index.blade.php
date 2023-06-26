@extends('layouts.app')

{{-- section --}}
@section('content')
   <div class="container-fluid py-4 px-5">
      <div class="row">
         <div class="col-12">
            <div class="card border shadow-xs mb-4">
                  <div class="card-header border-bottom pb-0">
                     <div class="d-sm-flex align-items-center mb-3">
                        <div>
                           <h3 class="font-weight-semibold text-lg mb-0">{{ $title }}</h3>
                           <p class="text-sm mb-sm-0">Home Page</p>
                        </div>
                     </div>
                  </div>
                  <div class="card-body px-0 py-0">
                     <div class="py-3 px-3">
                        <div class="card mb-3">
                              <img src="https://source.unsplash.com/600x150?library" class="card-img-top" alt="Pharmacy">
                              <div class="card-body">
                                 <h5 class="card-title text-center">Welcome to Book Library</h5>
                                 <p class="card-text text-center">A sanctuary for book lovers, where every page turns into an adventure</p>
                              </div>
                        </div>
                     </div>
                  </div>
                  <div class="row d-flex align-items-center justify-content-center ms-2">
                     <div class="col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="py-1 px-1">
                           <div class="card" style="width: 90%;">
                              <img src="https://source.unsplash.com/400x80?books" class="card-img-top" alt="Books">
                              <div class="card-body">
                                 <h5 class="card-title text-center">{{$books->count() }}</h5>
                                 @can('reader')
                                    <p class="card-text text-center">Total All Books</p>
                                 @endcan
                                 @can('writer')
                                    <p class="card-text text-center">Total All Your Books</p>
                                 @endcan
                                 <p class="card-text text-center">At The Moment</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="py-1 px-1">
                           <div class="card" style="width: 90%;">
                              <img src="https://source.unsplash.com/400x80?book" class="card-img-top" alt="Category">
                              <div class="card-body">
                                 <h5 class="card-title text-center">{{ $categories->count() }}</h5>
                                 @can('reader')
                                    <p class="card-text text-center">Total All Categories</p>
                                 @endcan
                                 @can('writer')
                                    <p class="card-text text-center">Total All Your Categories</p>
                                 @endcan
                                 <p class="card-text text-center">At The Moment</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="py-1 px-1">
                           <div class="card" style="width: 90%;">
                              <img src="https://source.unsplash.com/400x80?publisher" class="card-img-top" alt="Publisher">
                              <div class="card-body">
                                 <h5 class="card-title text-center">{{ $publishers->count() }}</h5>
                                 @can('reader')
                                    <p class="card-text text-center">Total All publishers</p>
                                 @endcan
                                 @can('writer')
                                    <p class="card-text text-center">Total All Your publishers</p>
                                 @endcan
                                 <p class="card-text text-center">At The Moment</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 col-lg-3 col-xl-3 mb-4">
                        <div class="py-1 px-1">
                           <div class="card" style="width: 90%;">
                              <img src="https://source.unsplash.com/400x80?person" class="card-img-top" alt="Authors">
                              <div class="card-body">
                                 <h5 class="card-title text-center">{{ $authors->count() }}</h5>
                                 <p class="card-text text-center">Total All Authors</p>
                                 <p class="card-text text-center">At The Moment</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection