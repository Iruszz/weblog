@extends('layouts.app')

@section('header1')
    @section('title', Auth::user()->name ?? 'Guest')
    @section('heading', 'Articles by ' . $user->name)
@endsection

@section('content')
    

    @if($articles->isEmpty())
    <div class="bg-white">
        <div class="mx-auto max-w-9/10 lg:px-8">
          <div class="mx-auto mt-15 pb-15 grid grid-cols-1 gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-4">
                <p>This user has no articles yet.</p>
          </div>
        </div>
    </div>
    @else
<div class="bg-white">
  <div class="mx-auto max-w-9/10 lg:px-8">
    <div class="mx-auto mt-15 pb-15 grid min-h-full grid-cols-1 gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-4">
        @foreach ($articles as $article)
            <article class="article-card flex flex-col max-w-xl items-start justify-between"
                style="background-image: "
                data-category-id="{{ $article->category_id }}">
                <a href="{{ route('articles.show', $article->id) }}" class="w-full">
                    <div class="flex flex-col w-full h-[400px] relative transform overflow-hidden rounded-lg text-left shadow-xl transition-all sm:w-full sm:max-w-lg bg-cover shadow-md"
                        style="background-image: linear-gradient(to top, #101828, #0000), url('{{ asset('storage/' . $article->image) }}')">
                        <div class="mt-auto mb-5 px-4 pt-5 sm:p-6 sm:pb-4">
                                <span class="relative rounded-full bg-{{ $article->category->color }} px-3.5 py-1 text-xs font-semibold text-{{ BadgeColor($article->category->color)['text'] }} hover:bg-gray-100">{{ $article->category->name }}</span>
                                <div class="flex items-center gap-x-4 text-xs font-semibold ">
                                    <time datetime="2020-03-16" class="text-gray-300">{{ $article->created_at->format('M d, Y') }}</time>
                                    <span class="mx-2 text-gray-400">•</span>
                                    <div class="relative  flex items-center gap-x-4">
                                        <div class="w-10 h-10 overflow-hidden rounded-full ">
                                            <img src="{{ asset('storage/' . $article->user->profile_picture) }}" alt="Profile Picture" class="object-cover w-full h-full">
                                        </div>
                                        <div class="text-gray-300 font-semibold relative">
                                            <span class="absolute inset-0"></span>
                                            {{ $article->user->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="group relative">
                                <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
                                    <span class="absolute inset-0"></span>
                                    {{ $article->title }}
                                </h3>
                                </div>
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
    </div>
  </div>
</div>
    @endif

@endsection