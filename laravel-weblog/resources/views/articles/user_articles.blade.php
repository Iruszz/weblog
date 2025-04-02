@extends('layouts.app')

@section('header1')
    @section('title', Auth::user()->name ?? 'Guest')
    @section('heading', 'Articles by ' . $user->name)
@endsection

@section('content')
    

    @if($articles->isEmpty())
        <p>This user has no articles yet.</p>
    @else
    <div class="bg-white">
        <div class="mx-auto max-w-7xl lg:px-8">
          <div class="mx-auto mt-5 pb-15 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
              @foreach ($articles as $article)
              
                  <article class="flex max-w-xl flex-col items-start justify-between">
                    <a href="{{ route('articles.show', $article->id) }}">
                        <div class=" items-center gap-x-4 text-xs">
                            <time datetime="2020-03-16" class="text-gray-500">{{ $article->created_at->format('M d, Y') }}</time>
                            <span href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</span>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                            <span class="absolute inset-0"></span>
                            {{ $article->title }}
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $article->body }}</p>
                        </div>
                    </a>    
                  </article>
                
              @endforeach
          </div>
        </div>
      </div>
    @endif

@endsection