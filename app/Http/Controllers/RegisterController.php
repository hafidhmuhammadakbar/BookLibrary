<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        $validatedData = request()->validate([
            'name' => 'required|min:5|alpha',
            'username' => 'required|min:5|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        
        $success = User::create($validatedData);
        
        if($success){
            return redirect()->route('login.index')->with('success', 'Registration successfull, please login');
        }
        else{
            return redirect()->route('register.index')->with('error', 'Registration failed, please try again');
        }
    }
}
