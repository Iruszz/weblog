<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function userArticles(User $user) {

        $articles = $user->articles;
    
        return view('articles.user_articles', compact('user', 'articles'));
    }
    

    public function create() {
        return view('auth.register', ['hideFooter' => true]);
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
