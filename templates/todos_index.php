<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Todoアプリ</title>
</head>
<body>

<h1>Todoリスト</h1>

<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="todos.php">
    <input type="text" name="title" placeholder="やることを入力">
    <button type="submit">追加</button>
</form>

<ul>
    <?php foreach ($todos as $todo): ?>
        <li>
            <?= htmlspecialchars($todo['title']) ?>
            <a href="todo_edit.php?id=<?= (int) $todo['id'] ?>">編集</a>
            <form method="POST" action="todo_delete.php" style="display: inline;">
                <input type="hidden" name="id" value="<?= (int) $todo['id'] ?>">
                <button type="submit" onclick="return confirm('削除しますか?');">削除</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
