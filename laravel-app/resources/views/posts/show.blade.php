@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="border-l-4 border-indigo-600 pl-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
    </div>

    @if (session('success'))
        <p class="mb-4 rounded-lg border border-green-200 bg-green-50 px-3 py-2 text-sm text-green-700">{{ session('success') }}</p>
    @endif

    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        @if ($post->image_path)
            <img src="{{ Storage::url($post->image_path) }}" width="400" alt="" class="mb-4 rounded-lg border border-gray-200">
        @endif

        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $post->body }}</p>
    </div>

    <div class="flex items-center gap-4 mt-4 mb-6">
        <a href="{{ route('posts.edit', $post) }}" class="text-sm text-indigo-600 hover:text-indigo-800 underline">編集</a>

        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('削除しますか?');" class="text-sm text-red-600 hover:text-red-800 underline">削除</button>
        </form>
    </div>

    <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 underline">一覧に戻る</a>
@endsection
