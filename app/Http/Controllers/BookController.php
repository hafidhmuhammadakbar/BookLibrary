<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use App\Exports\MyBooksExport;

class BookController extends Controller
{
    public function index(){
        $title = '';
        
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        if(request('publisher')){
            $publisher = Publisher::firstWhere('slug', request('publisher'));
            $title = ' by ' . $publisher->name;
        }
        
        return view('books.index', [
            'active' => 'books',
            'title' => 'All Books' . $title,
            'books' => Book::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function show(Book $book){
        return view('books.show', [
            "active" => "books",
            "title" => 'Book Detail',
            "book" => $book
        ]);
    }

    public function dashboard()
    {
        $user = Auth::user();
        
        $authors = User::where('role', 'writer')->get();
        $books = Book::all();
        $categories = Category::all();
        $publishers = Publisher::all();

        if ($user->role == 'writer') {
            $books = Book::where('author_id', $user->id)->get();
            $categories = Category::whereIn('id', $books->pluck('category_id'))->get();
            $publishers = Publisher::whereIn('id', $books->pluck('publisher_id'))->get();
        }

        return view('dashboard.index', [
            "active" => "home",
            "title" => "Home",
        ])->with(compact('books', 'categories', 'publishers', 'authors'));
    }

    public function mybooks(){
        $user = Auth::user();

        $title = '';
        
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        if(request('publisher')){
            $publisher = Publisher::firstWhere('slug', request('publisher'));
            $title = ' by ' . $publisher->name;
        }
        
        return view('mybooks.index', [
            'active' => 'mybooks',
            'title' => 'All My Books' . $title,
            'mybooks' => Book::latest()->where('author_id', $user->id)->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function mybooksShow(Book $book)
    {   
        if (! Gate::allows('update-book', $book)) {
            return redirect (route('mybooks.index'))->with('error', 'You dont have authorization to edit this book!');
        }

        return view('mybooks.show', [
            "active" => "mybooks",
            "title" => 'Book Detail',
            "mybook" => $book
        ]);
    }

    public function mybooksCreate()
    {
        return view('mybooks.create', [
            "active" => "mybooks",
            "title" => "Create Book"
        ]);
    }

    public function mybooksStore()
    {
        $validatedData = request()->validate([
            'title' => 'required|unique:books',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required|max:255',
            'sinopsis' => 'required',
            'pages' => 'required|numeric|min:1',
            'publication_date' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // make slug from title
        $slug = Str::slug(request('title'), '-');

        $author_id = auth()->user()->id;

        $success = Book::create([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'author_id' => $author_id,
            'category_id' => $validatedData['category_id'],
            'publisher_id' => $validatedData['publisher_id'],
            'description' => $validatedData['description'],
            'sinopsis' => $validatedData['sinopsis'],
            'publication_date' => $validatedData['publication_date'],
            'pages' => $validatedData['pages'],
            'images' => request('images') ? request('images')->store('book_images') : null,
        ]);

        if($success) {
            return redirect(route('mybooks.index'))->with('success', 'Book has been created!');
        } else {
            return redirect(route('mybooks.index'))->with('error', 'Book failed to create!');
        }
    }

    public function mybooksEdit(Book $book)
    {
        if (! Gate::allows('update-book', $book)) {
            return redirect (route('mybooks.index'))->with('error', 'You dont have authorization to edit this book!');
        }
        
        return view('mybooks.edit', [
            "active" => "mybooks",
            "title" => "Edit Book",
            "mybook" => $book
        ]);
    }

    public function mybooksUpdate(Book $book){

        $oldImage = $book->images;

        $validatedData = request()->validate([
            'title' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required|max:255',
            'sinopsis' => 'required',
            'pages' => 'required|numeric|min:1',
            'publication_date' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // make slug from title
        $slug = Str::slug(request('title'), '-');

        $author_id = auth()->user()->id;

        if(request('images') != null){
            if($oldImage != null){
                Storage::delete($oldImage);
            }

            $images = request('images')->store('book_images');
        } else {
            $images = $oldImage;
        }

        $success = $book->update([
            'title' => $validatedData['title'],
            'slug' => $slug,
            'author_id' => $author_id,
            'category_id' => $validatedData['category_id'],
            'publisher_id' => $validatedData['publisher_id'],
            'description' => $validatedData['description'],
            'sinopsis' => $validatedData['sinopsis'],
            'publication_date' => $validatedData['publication_date'],
            'pages' => $validatedData['pages'],
            'images' => $images,
        ]);

        if($success) {
            return redirect(route('mybooks.index'))->with('success', 'Book has been updated!');
        } else {
            return redirect(route('mybooks.index'))->with('error', 'Book failed to update!');
        }
    }

    public function destroy(Book $book)
    {
        if (! Gate::allows('update-book', $book)) {
            return redirect (route('mybooks.index'))->with('error', 'You dont have authorization to delete this book!');
        }

        $success = $book->delete();

        if($success) {
            return redirect(route('mybooks.index'))->with('success', 'Book has been deleted!');
        } else {
            return redirect(route('mybooks.index'))->with('error', 'Book failed to delete!');
        }
    }

    public function exportExcel(): BinaryFileResponse
    {
        return Excel::download(new MyBooksExport, 'mybooks.xlsx');
    }
}
