<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;

class ArticleController extends Controller
{
    public function userArticles(User $user) {
        $articles = Article::with('user')->get();
        return view('articles.user_articles', compact('user', 'articles'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user', 'category')->get();
        $user = Auth::user();
        $categories = Category::all();
        
        return view('articles.index', compact('articles', 'user', 'categories'))->with('showCategory', true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $articles = Article::with('user')->get();
        $user = Auth::user();
        return view('articles.create', compact('articles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = auth()->user()->id;

        $article->save();

        return redirect()->route('user.articles', ['user' => auth()->user()->id])
        ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $user = auth()->user();
        return view('articles.show', compact('article', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $user = auth()->user();

        return view('articles.edit', compact('article', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $article->update($request->all());
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $user = auth()->user();
        $article->delete();

        return redirect()->route('user.articles', ['user' => auth()->user()->id])
        ->with('Article deleted');
    }

}
