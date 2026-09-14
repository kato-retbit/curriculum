<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/../app/Models/Post.php';
require_once __DIR__ . '/../app/Support/Validator.php';
require_once __DIR__ . '/../app/Support/Uploader.php';

set_exception_handler(function (Throwable $e): void {
    error_log($e->getMessage());
    http_response_code(500);
    echo 'エラーが発生しました。しばらくしてから再度お試しください。';
    exit;
});
