<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('author.index', [
            'title' => 'All Author',
            'active' => 'authors',
            'authors' => User::all(),
        ]);
    }
}
