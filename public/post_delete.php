<?php

require __DIR__ . '/../config/bootstrap.php';

$pdo = getPdo();
$postModel = new Post($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);
    $postModel->softDelete($id);
}

header('Location: posts.php');
exit;
