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
                                 <p class="text-sm mb-sm-0">All Books Page</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <form action="/books" method="GET">
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

                  @if ($books->count())
                     <div class="container">
                        <div class="card mb-5 mt-5">
                           <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                              <a href="/books?category={{ $books[0]->category->slug }}" class="text-white text-decoration-none"> {{ $books[0]->category->name }}</a>
                           </div>

                           @if($books[0]->images != null)
                              <img src="{{ asset('storage/' . $books[0]->images) }}" class="card-img-top img-fluid" style="height: 400px; width: 1500px;" alt="{{ $books[0]->category->name }}">
                           @else
                              <img src="https://source.unsplash.com/1200x400?{{ $books[0]->category->name }}" class="card-img-top" alt="{{ $books[0]->category->name }}">
                           @endif
                           
                           <div class="card-body text-center">
                              <h2 class="card-title"><a href="/books/{{ $books[0]->slug }}" class="text-decoration-none text-dark" style="text-transform: capitalize;">{{ $books[0]->title }}</a></h2>
                              <p>
                                 <small class="text-body-secondary">
                                    By. <a href="/books?author={{ $books[0]->author->username }}" class="text-decoration-none">{{ $books[0]->author->name }}</a> in 
                                       <a href="/books?category={{ $books[0]->category->slug }}" class="text-decoration-none">{{ $books[0]->category->name }}</a>
                                       {{ $books[0]->created_at->diffForHumans() }}
                                 </small>
                              </p>
                              <p>
                                 <small class="text-body-secondary">
                                    Publish by <a href="/books?publisher={{ $books[0]->publisher->slug }}" class="text-decoration-none">{{ $books[0]->publisher->name }}</a>
                                 </small>
                              </p>
                              <p class="card-text">{{ $books[0]->excerpt }}</p>
   
                              <a href="/books/{{$books[0]->slug}}" class="text-decoration-none btn btn-primary">
                                 <i class="bi bi-book"></i>  Read more</a>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                           <div class="row">
                              @foreach ($books->skip(1) as $book)
                                 <div class="col-md-4 mb-3">
                                       <div class="card">
                                          <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
                                             <a href="/books?category={{ $book->category->slug }}" class="text-white text-decoration-none"> {{ $book->category->name }}</a>
                                          </div>

                                          @if($book->images != null)
                                             <img src="{{ asset('storage/' . $book->images) }}" class="card-img-top img-fluid" style="height: 330px; width: 500px;" alt="{{ $book->category->name }}">
                                          @else
                                             <img src="https://source.unsplash.com/500x400?{{ $book->category->name }}" class="card-img-top" alt="{{ $book->category->name }}">
                                          @endif
                                          
                                          <div class="card-body">
                                             <h5 class="card-title" style="text-transform: capitalize;">{{ $book->title }}</h5>
                                             <p>
                                                   <small class="text-body-secondary">
                                                      By. <a href="/books?author={{ $book->author->username }}" class="text-decoration-none">{{ $book->author->name }}</a>
                                                      {{ $book->created_at->diffForHumans() }}
                                                   </small>
                                             </p>
                                             <p>
                                                <small class="text-body-secondary">
                                                   Publish by <a href="/books?publisher={{ $book->publisher->slug }}" class="text-decoration-none">{{ $book->publisher->name }}</a>
                                                </small>
                                             </p>
                                             <p class="card-text">{{ $book->description }}</p>
                                             <a href="/books/{{$book->slug}}" class="btn btn-primary">
                                                <i class="bi bi-book"></i>  Read More</a>
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
                     {{ $books->links() }}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection