<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel学習サイト')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 flex flex-col">

<x-header />

<main class="flex-1 w-full max-w-3xl mx-auto px-4 py-8">
    @yield('content')
</main>

<x-footer />

</body>
</html>
