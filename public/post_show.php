<?php

require __DIR__ . '/../config/bootstrap.php';

$pdo = getPdo();
$postModel = new Post($pdo);

$id = (int) ($_GET['id'] ?? 0);
$post = $postModel->find($id);

if (!$post) {
    http_response_code(404);
    echo '投稿が見つかりません';
    exit;
}

require __DIR__ . '/../templates/post_show.php';
