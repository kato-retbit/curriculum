<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>フォーム処理サンプル</title>
</head>
<body>

<h1>お問い合わせフォーム</h1>

<?php if ($success): ?>
    <p style="color: green;">送信が完了しました。<?= htmlspecialchars($name) ?>さん、ありがとうございます。</p>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <ul style="color: red;">
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="">
    <label>
        お名前:
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    </label>
    <button type="submit">送信</button>
</form>

</body>
</html>
