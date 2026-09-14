<?php

require __DIR__ . '/../config/database.php';

$pdo = getPdo();
$errors = [];

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

$stmt = $pdo->prepare('SELECT id, title FROM todos WHERE id = :id');
$stmt->execute(['id' => $id]);
$todo = $stmt->fetch();

if (!$todo) {
    header('Location: todos.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');

    if ($title === '') {
        $errors[] = 'タイトルを入力してください';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare('UPDATE todos SET title = :title WHERE id = :id');
        $stmt->execute(['title' => $title, 'id' => $id]);

        header('Location: todos.php');
        exit;
    }

    $todo['title'] = $title;
}

require __DIR__ . '/../templates/todo_edit.php';
