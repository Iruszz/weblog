<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::id();
        
        Comment::create($validated);

        // TODO Needing to edit
        // $article->comments()->create([
        //     'user_id' => Auth::id(),
        //     'body' => request('body'),
        // ]);

       return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
