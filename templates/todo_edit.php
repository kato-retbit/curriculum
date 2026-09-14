<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Todo編集</title>
</head>
<body>

<h1>Todoを編集</h1>

<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="todo_edit.php">
    <input type="hidden" name="id" value="<?= (int) $todo['id'] ?>">
    <input type="text" name="title" value="<?= htmlspecialchars($todo['title']) ?>">
    <button type="submit">更新</button>
</form>

<a href="todos.php">一覧に戻る</a>

</body>
</html>
