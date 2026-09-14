@extends('layouts.app')

@section('title', '新規投稿')

@section('content')
    <div class="border-l-4 border-indigo-600 pl-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">新規投稿</h1>
    </div>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="max-w-lg">
        @csrf
        @include('posts._form')
    </form>

    <div class="mt-6">
        <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 underline">一覧に戻る</a>
    </div>
@endsection
