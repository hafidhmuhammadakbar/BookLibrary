@extends('layouts.app')

{{-- section --}}
@section('content')
   <div class="container-fluid py-4 px-5">
      {{-- @if ($success->any())
         <div class="alert alert-success">
            <ul class="mb-0">
               @foreach ($success->all() as $success)
                     <li>{{ $success }}</li>
               @endforeach
            </ul>
         </div>
      @elseif ($errors->any())
         <div class="alert alert-danger">
            <ul class="mb-0">
               @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
      <div class="row"> --}}
         <div class="col-12">
            <div class="card border shadow-xs mb-4">
                  <div class="card-header border-bottom pb-0">
                     <div class="row d-flex ">
                        <div class="col-md-3">
                           <div class="d-sm-flex align-items-center mb-3">
                              <div>
                                 <h3 class="font-weight-semibold text-lg mb-0">{{ $title }}</h3>
                                 <p class="text-sm mb-sm-0">All Books Page</p>
                              </div>
                           </div>
                        </div>
                        @can('writer')
                           <div class="col-md-3 my-2 p-2">
                              <a href="{{ route('mybooks.create') }}" class="text-decoration-none btn btn-primary">
                                 <span class="btn-inner--text">Add book</span>
                              </a>
                           </div>
                        @endcan
                        <div class="col-md-6">
                           <form action="/mybooks" method="GET">
                              @if (request('category'))
                                 <input type="hidden" name="category" value="{{ request('category') }}">
                              @endif
                              @if (request('author'))
                                 <input type="hidden" name="author" value="{{ request('author') }}">
                              @endif
                              <div class="input-group mt-3 mb-3">
                                 <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                                 <button class="btn btn-primary" type="submit" id="button-add">Search</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  @if ($mybooks->count())
                     <div class="container">
                        <div class="card mb-5 mt-5">
                           <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                              <a href="/mybooks?category={{ $mybooks[0]->category->slug }}" class="text-white text-decoration-none"> {{ $mybooks[0]->category->name }}</a>
                           </div>
                           <img src="https://source.unsplash.com/1200x400?{{ $mybooks[0]->category->name }}" class="card-img-top" alt="{{ $mybooks[0]->category->name }}">
                           <div class="card-body text-center">
                              <h2 class="card-title"><a href="/mybooks/{{ $mybooks[0]->slug }}" class="text-decoration-none text-dark">{{ $mybooks[0]->title }}</a></h2>
                              <p>
                                 <small class="text-body-secondary">
                                    By. <a href="/mybooks?author={{ $mybooks[0]->author->username }}" class="text-decoration-none">{{ $mybooks[0]->author->name }}</a> in 
                                       <a href="/mybooks?category={{ $mybooks[0]->category->slug }}" class="text-decoration-none">{{ $mybooks[0]->category->name }}</a>
                                       {{ $mybooks[0]->created_at->diffForHumans() }}
                                 </small>
                              </p>
                              <p>
                                 <small class="text-body-secondary">
                                    Publish by <a href="/mybooks?publisher={{ $mybooks[0]->publisher->slug }}" class="text-decoration-none">{{ $mybooks[0]->publisher->slug }}</a>
                                 </small>
                              </p>
                              <p class="card-text">{{ $mybooks[0]->excerpt }}</p>
   
                              <a href="/mybooks/{{$mybooks[0]->slug}}" class="text-decoration-none btn btn-primary">Read more</a>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                           <div class="row">
                              @foreach ($mybooks->skip(1) as $mybook)
                                 <div class="col-md-4 mb-3">
                                       <div class="card">
                                          <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                             <a href="/mybooks?category={{ $mybook->category->slug }}" class="text-white text-decoration-none"> {{ $mybook->category->name }}</a>
                                          </div>
                                          <img src="https://source.unsplash.com/500x400?{{ $mybook->category->name }}" class="card-img-top" alt="{{ $mybook->category->name }}">
                                          <div class="card-body">
                                             <h5 class="card-title">{{ $mybook->title }}</h5>
                                             <p>
                                                   <small class="text-body-secondary">
                                                      By. <a href="/mybooks?author={{ $mybook->author->username }}" class="text-decoration-none">{{ $mybook->author->name }}</a>
                                                      {{ $mybook->created_at->diffForHumans() }}
                                                   </small>
                                             </p>
                                             <p>
                                                <small class="text-body-secondary">
                                                   Publish by <a href="/mybooks?publisher={{ $mybook->publisher->slug }}" class="text-decoration-none">{{ $mybook->publisher->slug }}</a>
                                                </small>
                                             </p>
                                             <p class="card-text">{{ $mybook->description }}</p>
                                             <a href="/mybooks/{{$mybook->slug}}" class="btn btn-primary">Read More</a>
                                          </div>
                                       </div>
                                 </div>
                              @endforeach
                           </div>
                     </div>
                  @else
                     <h3 class="text-center mt-3 mb-3 ">No books found</h3>
                  @endif

                  <div class="d-flex justify-content-center">
                     {{ $mybooks->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection