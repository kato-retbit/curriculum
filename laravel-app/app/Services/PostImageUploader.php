<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class PostImageUploader
{
    /**
     * アップロードされた画像をstorageに保存し、保存先のパスを返す。
     * 画像が無ければnullを返す。
     */
    public function store(?UploadedFile $image): ?string
    {
        if (! $image) {
            return null;
        }

        return $image->store('posts', 'public');
    }
}
