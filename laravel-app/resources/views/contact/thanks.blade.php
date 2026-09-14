@extends('layouts.app')

@section('title', '送信完了')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">送信完了</h1>

    <p class="text-gray-600 mb-4">{{ $name }}様、お問い合わせありがとうございます。</p>

    <a href="{{ route('home') }}" class="text-sm text-indigo-600 hover:text-indigo-800 underline">トップへ戻る</a>
@endsection
