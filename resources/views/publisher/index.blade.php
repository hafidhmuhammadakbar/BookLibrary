@extends('layouts.app')

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
                              <p class="text-sm mb-sm-0">All Publishers Page</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <div class="row">
                     @foreach ($publishers as $publisher)
                        <div class="col-md-4 my-4">
                           <a href="/books?publisher={{ $publisher->slug }}">
                              <div class="card text-bg-dark">
                                 <img src="https://source.unsplash.com/500x500?publisher-logos" class="card-img" alt="{{ $publisher->name }}">
                                 <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $publisher->name }}</h5>
                                 </div>
                              </div>
                           </a>
                        </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection