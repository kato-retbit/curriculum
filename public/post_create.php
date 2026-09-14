<?php

require __DIR__ . '/../config/bootstrap.php';

$pdo = getPdo();
$postModel = new Post($pdo);

// ログイン機能が無いため、暫定的に最初のユーザーを投稿者として扱う
$currentUserId = (int) $pdo->query('SELECT id FROM users ORDER BY id LIMIT 1')->fetchColumn();

$title = '';
$body = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $body = trim($_POST['body'] ?? '');

    $validator = new Validator();
    $validator->required($title, 'タイトル')
              ->maxLength($title, 200, 'タイトル')
              ->required($body, '本文');

    $imagePath = null;

    if (!empty($_FILES['image']['name'])) {
        $result = uploadImage($_FILES['image']);

        if ($result['error']) {
            $validator->addError($result['error']);
        } else {
            $imagePath = $result['path'];
        }
    }

    if (!$validator->fails()) {
        $postId = $postModel->create([
            'user_id' => $currentUserId,
            'title' => $title,
            'body' => $body,
            'image_path' => $imagePath,
        ]);

        header('Location: post_show.php?id=' . $postId);
        exit;
    }

    $errors = $validator->errors();
}

$mode = 'create';
$action = 'post_create.php';
$currentImage = null;

require __DIR__ . '/../templates/post_form.php';
