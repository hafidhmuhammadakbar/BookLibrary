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
                                        <h3 class="font-weight-semibold text-lg mb-0">Edit Book</h3>
                                        <p class="text-sm mb-sm-0">Please fill the form</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mybooks.update', $mybook) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Book Title" required value="{{ $mybook->title }}"
                                    autofocus>
                                <label for="title">Book Title</label>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    name="description" id="description" placeholder="Description" required
                                    value="{{ $mybook->description }}">
                                <label for="description">Description</label>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('sinopsis') is-invalid @enderror" placeholder="Sinopsis"
                                    id="sinopsis" name="sinopsis" style="height: 100px">{{  $mybook->sinopsis }}</textarea>
                                <label for="sinopsis" id="sinopsis" required>Sinopsis</label>
                                @error('sinopsis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control @error('pages') is-invalid @enderror"
                                    name="pages" id="pages" placeholder="Pages" required value="{{ $mybook->pages }}">
                                <label for="pages">Pages</label>
                                @error('pages')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('publication_date') is-invalid @enderror"
                                    name="publication_date" id="publication_date" placeholder="publication_date" required value="{{ $mybook->publication_date }}">
                                <label for="publication_date">publication_date</label>
                                @error('publication_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="publisher_id" aria-label="Floating label select example"
                                    name="publisher_id">
                                    <option disabled>Select your publisher</option>
                                    @foreach (\App\Models\Publisher::all() as $publisher)
                                        <option value="{{$publisher->id}}" {{ $mybook->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                                    @endforeach
                                </select>
                                <label for="publisher_id">Publisher</label>
                                @error('publisher_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="category_id" aria-label="Floating label select example"
                                    name="category_id">
                                    <option disabled>Select your category</option>
                                    @foreach (\App\Models\Category::all() as $category)
                                        <option value="{{$category->id}}" {{ $mybook->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category_id">category</label>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="border rounded">
                                <div class="p-2">
                                    <label for="images">Screenshot Website View</label>
                                    <div class="row my-3">
                                        <div class="col-12 col-sm-6">
                                            @if ($mybook->images != null)
                                                <img class="img-preview w-100 mb-4" src="{{ asset('storage/'.$mybook->images) }}">
                                            @else
                                                <img class="img-preview w-100 mb-4">
                                            @endif
                                        </div>
                                    </div>
                                    <input id="images" name="images" onchange="previewImage()"
                                        class="form-control my-2" 
                                        type="file">
                                </div>
                            </div>

                            <button class="btn btn-primary w-100 py-2" type="submit">Edit Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
