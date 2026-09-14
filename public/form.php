<?php

$errors = [];
$success = false;
$name = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');

    if ($name === '') {
        $errors[] = '名前を入力してください';
    }

    if (empty($errors)) {
        $success = true;
    }
}

require __DIR__ . '/../templates/form_template.php';
