@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')
    <div class="border-l-4 border-indigo-600 pl-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">プロフィール</h1>
    </div>

    @if (session('success'))
        <p class="mb-4 rounded-lg border border-green-200 bg-green-50 px-3 py-2 text-sm text-green-700">{{ session('success') }}</p>
    @endif

    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm space-y-3 max-w-sm">
        <div>
            <p class="text-xs text-gray-500">名前</p>
            <p class="text-gray-900">{{ $user->name }}</p>
        </div>
        <div>
            <p class="text-xs text-gray-500">メールアドレス</p>
            <p class="text-gray-900">{{ $user->email }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('profile.edit') }}" class="text-sm text-indigo-600 hover:text-indigo-800 underline">編集する</a>
    </div>
@endsection
