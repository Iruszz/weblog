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

    public function store(StoreArticleRequest $request)
    {

        // TODO :: request voor maken
        $validated = $request->validated();

        $user = User::create($attributes);

        Auth::login($user);

        return redirect()->route('user.articles', ['user' => $user->id]);

    }
}
