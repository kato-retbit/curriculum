<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>
<body>

<h1>投稿一覧</h1>

<a href="post_create.php">新規投稿</a>

<ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="post_show.php?id=<?= (int) $post['id'] ?>"><?= htmlspecialchars($post['title']) ?></a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
