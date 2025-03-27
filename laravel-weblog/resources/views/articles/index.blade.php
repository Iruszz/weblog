@extends('layouts.app')

@section('title', 'Articles')
@section('heading', 'All articles')

@section('content')
    <div class="bg-white">
  <div class="mx-auto max-w-7xl lg:px-8">
    <div class="mx-auto mt-5 pb-15 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach ($articles as $article)
            <article class="flex max-w-xl flex-col items-start justify-between">
                <div class="flex items-center gap-x-4 text-xs">
                <time datetime="2020-03-16" class="text-gray-500">{{ $article->created_at->format('M d, Y') }}</time>
                <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Marketing</a>
                </div>
                <div class="group relative">
                <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                    <a href="#">
                    <span class="absolute inset-0"></span>
                    {{ $article->title }}
                    </a>
                </h3>
                <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $article->body }}</p>
                </div>
                <div class="relative mt-8 flex items-center gap-x-4">
                <img src="{{ asset('storage/' . $article->user->profile_picture) }}" alt="Profile Picture" class="size-10 rounded-full bg-gray-50">
                <div class="text-sm/6">
                    <p class="font-semibold text-gray-900">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        <p>{{ $article->user->name }}</p>
                    </a>
                    </p>
                </div>
                </div>
            </article>
        @endforeach
    </div>
  </div>
</div>



@endsection