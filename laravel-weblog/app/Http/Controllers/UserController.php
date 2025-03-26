<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class Usercontroller extends Controller
{
    public function userArticles(User $user) {
        $articles = $user->articles;
    
        return view('articles.user_articles', compact('user', 'articles'));
    }
    

    public function create() {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // Validate the request data
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect()->route('user.articles', ['user' => $user->id]);

    }
}
