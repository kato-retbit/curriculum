<?php

require __DIR__ . '/../config/bootstrap.php';

$pdo = getPdo();
$postModel = new Post($pdo);

$posts = $postModel->all();

require __DIR__ . '/../templates/post_index.php';
