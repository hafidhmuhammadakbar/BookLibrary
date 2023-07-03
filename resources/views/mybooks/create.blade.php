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
                        <form action="{{ route('mybooks.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" placeholder="Book Title" required value="{{ old('title') }}"
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
                                    value="{{ old('description') }}">
                                <label for="description">Description</label>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Sinopsis" id="sinopsis" name="sinopsis" style="height: 100px"></textarea>
                                <label for="sinopsis" id="sinopsis"required value="{{ old('sinopsis') }}">Sinopsis</label>
                                @error('sinopsis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control @error('pages') is-invalid @enderror"
                                    name="pages" id="pages" placeholder="Pages" required value="{{ old('pages') }}">
                                <label for="pages">Pages</label>
                                @error('pages')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('publication_date') is-invalid @enderror"
                                    name="publication_date" id="publication_date" placeholder="publication_date" required value="{{ old('publication_date') }}">
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
                                        <option value="{{ $publisher->id }}" @if (old('publisher_id') === 'writer') selected @endif>{{ $publisher->name }}</option>
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
                                        <option value="{{ $category->id }}" @if (old('category_id') === 'writer') selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category_id">category</label>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary w-100 py-2" type="submit">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
