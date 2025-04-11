@extends('layouts.app')

@section('header1')
    @section('title', 'New acticle')
    @section('heading', 'Create a new articles')
@endsection

@section('content')
<div class="min-h-full bg-white">
    <div class="mx-auto max-w-7xl lg:px-8">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 border border-gray-300 focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 @error('title') border-red-500 focus-within:border-red-500 focus-within:ring-red-500 @enderror">
                                    <input type="text" name="title" id="title" 
                                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 
                                        placeholder:text-gray-400 focus:outline-none sm:text-sm @error('title') text-red-500 @enderror" 
                                        value="{{ old('title') }}">
                                </div>                                
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="body" class="block text-sm/6 font-medium text-gray-900">Article</label>
                            <div class="mt-2">
                                <textarea name="body" id="body" rows="3" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-indigo-600 sm:text-sm @error('body') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">{{ old('body') }}</textarea>
                            
                            </div>

                            @error('body')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <p class="mt-3 text-sm/6 text-gray-600">Write your article here</p>
                        </div>
                        
                        <div class="col-span-full">
                            <label for="body" class="block text-sm/6 font-medium text-gray-900">Category</label>
                            <div class="mt-2">
                                <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 flex items-center space-x-4 rounded-md px-4 py-2 text-sm font-medium"
                                type="button">
                                Category
                                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                </button>
                        <!-- Dropdown menu -->
                        <div id="dropdown" class="hidden absolute w-50 top-10 p-3 bg-white rounded-lg shadow">
                            <h6 class="mb-3 text-sm font-medium text-gray-900">
                            Category
                            </h6>
                            <div class="mb-3">
                            @foreach ($categories as $category)
                                <ul class="pl-2 my-2 text-sm" aria-labelledby="dropdownDefault">
                                <li class="flex items-center space-x-2">
                                    <input 
                                    type="checkbox"
                                    id="category-{{ $category->id }}"
                                    value="{{ $category->id }}"
                                    class="category-checkbox w-4 h-4 bg-gray-300 border-gray-300 rounded text-primary-600" 
                                    />
                                    <span for="category-{{ $category->id }}" class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-{{ BadgeColor($category->color)['text'] }} bg-{{ $category->color }}">
                                    {{ $category->name }}
                                    </span>
                                </li>
                                </ul>
                            @endforeach
                            </div>
                            
                            <button class="flex items-center create-category-button pl-2 pt-2 space-x-1 border-t border-gray-200 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" class="size-5 stroke-blue-700">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>            
                            <span class="flex-grow text-sm font-medium text-blue-700">Create new category</span>
                            </button>
                    
                            <form action="{{ route('categories.store') }}" method="POST"
                            class="hidden create-category-input pt-2 mt-2 border-t border-gray-200"
                            >
                            @csrf
                            <input type="category" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-1.5" 
                                placeholder="Category name" 
                                required 
                            />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ url()->previous() }}" type="button" class="text-sm/6 font-semibold text-gray-900">
                    Cancel
                </a>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Save
                    </button>
            </div>
        </form> 
    </div>
</div>


@endsection