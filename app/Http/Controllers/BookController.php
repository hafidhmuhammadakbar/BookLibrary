<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

    public function mybooksShow(Book $book){
        return view('mybooks.show', [
            "active" => "mybooks",
            "title" => 'Book Detail',
            "mybook" => $book
        ]);
    }

    public function create()
    {
        return view('mybooks.create', [
            "active" => "mybooks",
            "title" => "Create Book"
        ]);
    }

    public function store(Request $request)
    {
        // make slug from title
        $slug = Str::slug($request->title, '-');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => ['required', Rule::unique('books')],
            'category_id' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'sinopsis' => 'required',
            'pages' => 'required|numeric|min:1',
            'publication_date' => 'required|date',
        ]);

        $validatedData['slug'] = $slug;
        $validatedData['cover'] = $request->file('cover')->store('assets/covers', 'public');

        Book::create($validatedData);

        return redirect('/mybooks')->with('success', 'Book has been created!');
    }

}
