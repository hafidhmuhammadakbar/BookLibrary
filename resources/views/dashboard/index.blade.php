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
                           <p class="text-sm mb-sm-0">Author Home Page</p>
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
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection