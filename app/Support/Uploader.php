<?php

function uploadImage(array $file): array
{
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxSize = 2 * 1024 * 1024; // 2MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['path' => null, 'error' => '画像のアップロードに失敗しました'];
    }

    if (!in_array($file['type'], $allowedTypes, true)) {
        return ['path' => null, 'error' => '画像はjpg・png・gif形式のみアップロードできます'];
    }

    if ($file['size'] > $maxSize) {
        return ['path' => null, 'error' => '画像サイズは2MB以内にしてください'];
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('post_', true) . '.' . $ext;
    $destination = __DIR__ . '/../../public/uploads/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        return ['path' => null, 'error' => '画像の保存に失敗しました'];
    }

    return ['path' => 'uploads/' . $filename, 'error' => null];
}
