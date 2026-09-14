<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= $mode === 'create' ? '新規投稿' : '投稿編集' ?></title>
</head>
<body>

<h1><?= $mode === 'create' ? '新規投稿' : '投稿編集' ?></h1>

<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="<?= htmlspecialchars($action) ?>" enctype="multipart/form-data">
    <div>
        <label>タイトル: <input type="text" name="title" value="<?= htmlspecialchars($title) ?>"></label>
    </div>
    <div>
        <label>本文:<br>
            <textarea name="body" rows="6" cols="50"><?= htmlspecialchars($body) ?></textarea>
        </label>
    </div>
    <div>
        <label>画像: <input type="file" name="image" accept="image/*"></label>
        <?php if (!empty($currentImage)): ?>
            <p>現在の画像: <br><img src="<?= htmlspecialchars($currentImage) ?>" width="150" alt=""></p>
        <?php endif; ?>
    </div>
    <button type="submit">保存</button>
</form>

<p><a href="posts.php">一覧に戻る</a></p>

</body>
</html>
