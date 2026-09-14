@extends('layouts.app')

@section('title', 'お問い合わせ')

@section('content')
    <div class="border-l-4 border-indigo-600 pl-4 mb-6">
        <h1 class="text-3xl font-bold text-gray-900">お問い合わせ</h1>
    </div>

    <form method="POST" action="{{ route('contact.submit') }}" class="max-w-sm">
        @csrf

        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">お名前</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 focus:outline-none">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">送信</button>
        </div>
    </form>
@endsection
