<?php

require __DIR__ . '/../config/database.php';

$pdo = getPdo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) ($_POST['id'] ?? 0);

    $stmt = $pdo->prepare('DELETE FROM todos WHERE id = :id');
    $stmt->execute(['id' => $id]);
}

header('Location: todos.php');
exit;
