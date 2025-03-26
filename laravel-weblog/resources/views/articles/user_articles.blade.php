@extends('layouts.app')

@section('title', Auth::user()->name ?? 'Guest')

@section('heading', 'Articles by ' . $user->name)

@section('content')
    

    @if($articles->isEmpty())
        <p>This user has no articles yet.</p>
    @else
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $article->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $article->body }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $article->created_at->format('M d, Y') }} <!-- Formatting created date -->
                            </td>
                            <td class="px-6 py-4">
                                <!-- Add any actions here, like edit or delete buttons -->
                                <a href="/articles/{{ $article->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection