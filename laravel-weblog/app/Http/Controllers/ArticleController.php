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
        $categories = Category::all();
        $articles = Article::with('user', 'category')->get();
        $user = Auth::user();
        
        return view('articles.index', compact('articles', 'user', 'categories'))
            ->with('showCategory', true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $articles = Article::with('user')->get();
        $user = Auth::user();

        return view('articles.create', compact('articles', 'user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = new Article($validated);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = Auth::id();
        $article->category_id = $request->category_id;

        if($request->hasFile('image')){
            $path = $request->file('image')->store('article_images', 'public');
            $article->image = $path;
        };

        $article->save();

        return redirect()->route('user.articles', ['user' => Auth::id()])
        ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $user = Auth::user();
        return view('articles.show', compact('article', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Article $article)
    {
        if ($request->user()->cannot('edit', $article)) {
            abort(403);
        }

        $categories = Category::all();
        $user = Auth::user();
        $imagePath = $article->image;

        return view('articles.edit', compact('article', 'user', 'categories', 'imagePath'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if ($request->user()->cannot('edit', $article)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('article_images', 'public');
            $validated['image'] = $path;
          };

        $article->update($validated);
        
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $user = Auth::user();
        $article->delete();

        return redirect()->route('user.articles', ['user' => Auth::id()])
        ->with('Article deleted');
    }

}
