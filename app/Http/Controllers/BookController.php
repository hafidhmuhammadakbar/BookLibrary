<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Book;
use App\Models\Publisher;


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
}
