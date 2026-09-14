@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div class="border-l-4 border-indigo-600 pl-4">
            <h1 class="text-3xl font-bold text-gray-900">投稿一覧</h1>
        </div>
        <a href="{{ route('posts.create') }}"
           class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">
            新規投稿
        </a>
    </div>

    @if (session('success'))
        <p class="mb-4 rounded-lg border border-green-200 bg-green-50 px-3 py-2 text-sm text-green-700">{{ session('success') }}</p>
    @endif

    <ul class="space-y-3">
        @foreach ($posts as $post)
            <li class="rounded-lg border border-gray-200 bg-white px-4 py-3 shadow-sm hover:shadow-md hover:border-indigo-300 transition-all">
                <a href="{{ route('posts.show', $post) }}" class="font-medium text-gray-800 hover:text-indigo-600">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
