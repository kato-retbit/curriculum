@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
    <div class="border-l-4 border-indigo-600 pl-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">プロフィール編集</h1>
    </div>

    @if (session('success'))
        <p class="mb-4 rounded-lg border border-green-200 bg-green-50 px-3 py-2 text-sm text-green-700">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul class="mb-4 list-inside list-disc rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" class="max-w-sm">
        @csrf
        @method('PUT')

        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">名前</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">メールアドレス</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 focus:outline-none">
            </div>

            <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">更新</button>
        </div>
    </form>

    <div class="mt-6">
        <a href="{{ route('profile.show') }}" class="text-sm text-indigo-600 hover:text-indigo-800 underline">プロフィールに戻る</a>
    </div>
@endsection
