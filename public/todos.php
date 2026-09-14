<?php

require __DIR__ . '/../config/database.php';

$pdo = getPdo();
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');

    if ($title === '') {
        $errors[] = 'タイトルを入力してください';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare('INSERT INTO todos (title) VALUES (:title)');
        $stmt->execute(['title' => $title]);

        header('Location: todos.php');
        exit;
    }
}

$stmt = $pdo->query('SELECT id, title, created_at FROM todos ORDER BY id DESC');
$todos = $stmt->fetchAll();

require __DIR__ . '/../templates/todos_index.php';
