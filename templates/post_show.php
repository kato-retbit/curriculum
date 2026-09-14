<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($post['title']) ?></title>
</head>
<body>

<h1><?= htmlspecialchars($post['title']) ?></h1>

<?php if ($post['image_path']): ?>
    <p><img src="<?= htmlspecialchars($post['image_path']) ?>" width="400" alt=""></p>
<?php endif; ?>

<p><?= nl2br(htmlspecialchars($post['body'])) ?></p>

<p>投稿日: <?= htmlspecialchars($post['created_at']) ?></p>

<a href="post_edit.php?id=<?= (int) $post['id'] ?>">編集</a>
<form method="POST" action="post_delete.php" style="display: inline;">
    <input type="hidden" name="id" value="<?= (int) $post['id'] ?>">
    <button type="submit" onclick="return confirm('削除しますか?');">削除</button>
</form>

<p><a href="posts.php">一覧に戻る</a></p>

</body>
</html>
