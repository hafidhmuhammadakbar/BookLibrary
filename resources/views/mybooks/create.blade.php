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
                    <h3 class="font-weight-semibold text-lg mb-0">Add Book</h3>
                    <p class="text-sm mb-sm-0">Please fill the form</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('mybooks.store') }}" enctype="multipart/form-data">
              @csrf

              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" name="title" class="form-control" id="title"
                      placeholder="Book Title" required>
                  </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="pages">Pages</label>
                      <input type="number" name="pages" class="form-control" id="pages" min="1" 
                        placeholder="Pages" required>
                    </div>
                  </div>
              </div>
                <div class="row mb-4">
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="form-select" id="category">
                        <option selected>Select the category</option>
                        @foreach (\App\Models\Category::all() as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="form-select" id="publisher">
                        <option selected>Select the publisher</option>
                        @foreach (\App\Models\Publisher::all() as $publisher)
                          <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="publication_date">Publication Date</label>
                      <input type="date" name="publication_date" class="form-control" id="publication_date"
                        placeholder="Publication Date" required>
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description">Book Description</label>
                      <input type="text" name="description" class="form-control" id="description"
                          placeholder="Book Description" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="sinopsis">Book Sinopsis</label>
                      <input type="text" name="sinopsis" class="form-control" id="sinopsis"
                          placeholder="Book Sinopsis" required>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
