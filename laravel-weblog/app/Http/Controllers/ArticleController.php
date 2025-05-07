<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
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
        $articles = Article::with('user', 'category')->get()->filter(function ($article) {
            return Auth::user() ? Auth::user()->can('view', $article) : !$article->is_premium;
        });
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
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('image')){
            $path = $request->file('image')->store('article_images', 'public');
        };

        $validated['user_id'] = Auth::id();
        $validated['image'] = $path;
        $validated['is_premium'] = $request->has('is_premium') ? true : false;

        Article::create($validated);

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

        // TODO :: Request class voor maken
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'is_premium' => 'nullable|boolean',
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('article_images', 'public');
            $validated['image'] = $path;
          };

        $validated['is_premium'] = $request->has('is_premium') ? true : false;

        $article->update($validated);
        
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('user.articles', ['user' => Auth::id()])
        ->with('Article deleted');
    }

}
