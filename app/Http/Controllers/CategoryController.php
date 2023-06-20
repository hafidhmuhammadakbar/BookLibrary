<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('category.index', [
            "active" => "categories",
            "title" => "All Categories",
            "categories" => Category::all()
        ]);
    }
}
