<?php

namespace App\Models;

use App\Database\Database;

class Post
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getLatestByCategory(int $categoryId, int $limit = 3): array
    {
        $sql = "
            SELECT p.* 
            FROM posts p
            INNER JOIN post_categories pc ON p.id = pc.post_id
            WHERE pc.category_id = ?
            ORDER BY p.created_at DESC
            LIMIT ?
        ";

        return $this->db->fetchAll($sql, [$categoryId, $limit]);
    }

    public function getByCategory(
        int    $categoryId,
        string $orderBy = 'created_at',
        int    $page = 1,
        int    $perPage = 10
    ): array
    {
        $offset = ($page - 1) * $perPage;

        $allowedOrderBy = ['created_at', 'views'];
        if (!in_array($orderBy, $allowedOrderBy)) {
            $orderBy = 'created_at';
        }

        $sql = "
            SELECT p.* 
            FROM posts p
            INNER JOIN post_categories pc ON p.id = pc.post_id
            WHERE pc.category_id = ?
            ORDER BY p.{$orderBy} DESC
            LIMIT ? OFFSET ?
        ";

        return $this->db->fetchAll($sql, [$categoryId, $perPage, $offset]);
    }

    public function getCountByCategory(int $categoryId): int
    {
        $sql = "
            SELECT COUNT(DISTINCT p.id) as count
            FROM posts p
            INNER JOIN post_categories pc ON p.id = pc.post_id
            WHERE pc.category_id = ?
        ";

        $result = $this->db->fetchOne($sql, [$categoryId]);

        return (int)($result['count'] ?? 0);
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT * FROM posts WHERE id = ?";

        return $this->db->fetchOne($sql, [$id]);
    }

    public function getSimilar(int $postId, int $limit = 3): array
    {
        $sql = "
            SELECT DISTINCT p.*, COUNT(pc2.category_id) as common_categories
            FROM posts p
            INNER JOIN post_categories pc2 ON p.id = pc2.post_id
            WHERE p.id != ? 
            AND pc2.category_id IN (
                SELECT category_id 
                FROM post_categories 
                WHERE post_id = ?
            )
            GROUP BY p.id
            ORDER BY common_categories DESC, p.created_at DESC
            LIMIT ?
        ";

        return $this->db->fetchAll($sql, [$postId, $postId, $limit]);
    }

    public function incrementViews(int $id): void
    {
        $sql = "UPDATE posts SET views = views + 1 WHERE id = ?";

        $this->db->query($sql, [$id]);
    }

    private function create(array $data): int
    {
        $sql = "
            INSERT INTO posts (title, description, content, image, views, created_at) 
            VALUES (?, ?, ?, ?, 0, NOW())
        ";

        $this->db->query($sql, [
            $data['title'],
            $data['description'],
            $data['content'],
            $data['image']
        ]);

        return (int)$this->db->lastInsertId();
    }

    private function attachCategories(int $postId, array $categoryIds): void
    {
        $values = [];
        $params = [];

        foreach ($categoryIds as $categoryId) {
            $values[] = '(?, ?)';
            $params[] = $postId;
            $params[] = $categoryId;
        }

        $sql = "INSERT INTO post_categories (post_id, category_id) VALUES " . implode(',', $values);
        $this->db->query($sql, $params);
    }


    public function createWithCategories(array $data, array $categoryIds): int
    {
        try {
            $this->db->getConnection()->beginTransaction();

            $postId = $this->create($data);
            $this->attachCategories($postId, $categoryIds);

            $this->db->getConnection()->commit();

            return $postId;

        } catch (\Exception $e) {
            $this->db->getConnection()->rollBack();
            throw $e;
        }
    }

    public function updateWithCategories(int $postId, array $data, array $categoryIds): bool
    {
        try {
            $this->db->getConnection()->beginTransaction();

            $sql = "
            UPDATE posts 
            SET title = ?, description = ?, content = ?, image = ?
            WHERE id = ?
        ";
            $this->db->query($sql, [
                $data['title'],
                $data['description'],
                $data['content'],
                $data['image'],
                $postId
            ]);

            $sql = "DELETE FROM post_categories WHERE post_id = ?";
            $this->db->query($sql, [$postId]);

            if (!empty($categoryIds)) {
                foreach ($categoryIds as $categoryId) {
                    $sql = "INSERT INTO post_categories (post_id, category_id) VALUES (?, ?)";
                    $this->db->query($sql, [$postId, $categoryId]);
                }
            }

            $this->db->getConnection()->commit();
            return true;

        } catch (\Exception $e) {
            $this->db->getConnection()->rollBack();
            throw $e;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        return $this->db->fetchAll($sql);
    }
}

