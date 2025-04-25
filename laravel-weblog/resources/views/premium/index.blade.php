@extends('layouts.app')


@section('header1')
    @section('title', 'Premium subscription')
    @section('heading', 'All articles')
@endsection

@section('content')

<div class="bg-white">
  <div class="mx-auto max-w-9/10 lg:px-8">
    <div class="mx-auto mt-15 pb-15 grid min-h-full justify-center items-center">
      @auth
          <div class="flex flex-col w-[300px] h-[450px] p-10 rounded-2xl border-4 border-purple-700 shadow-2xl shadow-md">
            <div class="flex flex-col space-y-5 justify-center items-center">
              <h1 class="text-lg font-medium text-black">Premium</h1>
              <h2 class="text-4xl uppercase font-medium text-black">Free</h2>
              <p class="text-sm font-medium text-gray-600 text-center">A free subscription to view premium articles. Only for premium members</p>
            </div>
            <div class="flex flex-col mt-auto space-y-3 justify-center items-center">
                <a href="{{ route('premium.index') }}" 
                  class="flex items-center space-x-4 rounded-md px-6 py-2 text-sm font-medium text-white bg-purple-700 hover:bg-blue-800">
                    <span>Sign up</span>
                </a>
                <span class="text-gray-500 text-xs font-light">Comes with a 14 day trial</span>
            </div>
          </div>
      @endauth
    </div>
  </div>
</div>

@endsection