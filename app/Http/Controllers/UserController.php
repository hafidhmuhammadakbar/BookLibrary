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
            'authors' => User::where('role', 'writer')->get(),
        ]);
    }

    public function profile()
    {
        return view('profile.index', [
            'title' => 'Profile',
            'active' => 'home',
            'user' => auth()->user(),
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'title' => 'Edit Profile',
            'active' => 'home',
            'user' => $user,
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'required|min:8',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);
        
        $success = $user->update($attributes);

        if ($success) {
            return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->route('profile.edit')->with('error', 'Profile failed to update.');
        }
    }
}
