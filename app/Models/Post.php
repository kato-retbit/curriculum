<?php

class Post
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all(): array
    {
        $stmt = $this->pdo->query(
            'SELECT * FROM posts WHERE deleted_at IS NULL ORDER BY id DESC'
        );

        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM posts WHERE id = :id AND deleted_at IS NULL'
        );
        $stmt->execute(['id' => $id]);
        $post = $stmt->fetch();

        return $post ?: null;
    }

    public function create(array $data): int
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO posts (user_id, title, body, image_path)
             VALUES (:user_id, :title, :body, :image_path)'
        );
        $stmt->execute([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'body' => $data['body'],
            'image_path' => $data['image_path'],
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE posts SET title = :title, body = :body, image_path = :image_path
             WHERE id = :id'
        );
        $stmt->execute([
            'title' => $data['title'],
            'body' => $data['body'],
            'image_path' => $data['image_path'],
            'id' => $id,
        ]);
    }

    public function softDelete(int $id): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE posts SET deleted_at = NOW() WHERE id = :id'
        );
        $stmt->execute(['id' => $id]);
    }
}
