<header class="sticky top-0 z-10 bg-white/90 backdrop-blur border-b border-gray-200 shadow-sm">
    <div class="max-w-3xl mx-auto px-4 py-4 flex flex-wrap items-center justify-between gap-y-2">
        <a href="{{ route('home') }}" class="text-lg font-bold tracking-tight">
            <span class="text-indigo-600">Laravel</span><span class="text-gray-900">学習サイト</span>
        </a>
        <nav class="flex gap-x-5 text-sm font-medium">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition-colors">トップ</a>
            <a href="{{ route('about') }}" class="text-gray-600 hover:text-indigo-600 transition-colors">About</a>
            <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-indigo-600 transition-colors">投稿一覧</a>
            <a href="{{ route('contact.show') }}" class="text-gray-600 hover:text-indigo-600 transition-colors">お問い合わせ</a>
            <a href="{{ route('profile.show') }}" class="text-gray-600 hover:text-indigo-600 transition-colors">プロフィール</a>
        </nav>
    </div>
</header>
