<?php

require __DIR__ . '/../config/bootstrap.php';

$pdo = getPdo();
$postModel = new Post($pdo);

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);
$post = $postModel->find($id);

if (!$post) {
    header('Location: posts.php');
    exit;
}

$title = $post['title'];
$body = $post['body'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $body = trim($_POST['body'] ?? '');

    $validator = new Validator();
    $validator->required($title, 'タイトル')
              ->maxLength($title, 200, 'タイトル')
              ->required($body, '本文');

    $imagePath = $post['image_path'];

    if (!empty($_FILES['image']['name'])) {
        $result = uploadImage($_FILES['image']);

        if ($result['error']) {
            $validator->addError($result['error']);
        } else {
            $imagePath = $result['path'];
        }
    }

    if (!$validator->fails()) {
        $postModel->update($id, [
            'title' => $title,
            'body' => $body,
            'image_path' => $imagePath,
        ]);

        header('Location: post_show.php?id=' . $id);
        exit;
    }

    $errors = $validator->errors();
}

$mode = 'edit';
$action = 'post_edit.php?id=' . $id;
$currentImage = $post['image_path'];

require __DIR__ . '/../templates/post_form.php';
