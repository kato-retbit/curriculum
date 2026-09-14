@if ($errors->any())
    <ul class="mb-4 list-inside list-disc rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-700">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">タイトル</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 focus:outline-none">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">本文</label>
        <textarea name="body" rows="6"
                  class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 focus:outline-none">{{ old('body', $post->body ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">画像</label>
        <input type="file" name="image" accept="image/*" class="text-sm">
        @if (!empty($post) && $post->image_path)
            <img src="{{ Storage::url($post->image_path) }}" width="150" alt="" class="mt-2 rounded-lg border border-gray-200">
        @endif
    </div>

    <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 transition-colors">保存</button>
</div>
