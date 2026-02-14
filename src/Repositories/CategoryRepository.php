<?php

namespace App\Repositories;

use App\Database\Database;
use App\Factory\CategoryFactory;
use App\Manager\CategoryManager;

class CategoryRepository implements CategoryRepositoryInterface
{
    private Database $db;
    private CategoryManager $categoryManager;
    private CategoryFactory $categoryFactory;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->categoryManager = new CategoryManager();
        $this->categoryFactory = new CategoryFactory();
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM categories ORDER BY name ASC";
        return $this->db->fetchAll($sql);
    }

    public function findById(int $id): ?array
    {
        $sql = "SELECT * FROM categories WHERE id = ?";
        return $this->db->fetchOne($sql, [$id]);
    }

    public function findWithPosts(): array
    {
        $sql = "
            SELECT DISTINCT c.* 
            FROM categories c
            INNER JOIN post_categories pc ON c.id = pc.category_id
            INNER JOIN posts p ON pc.post_id = p.id
            ORDER BY c.name ASC
        ";
        return $this->db->fetchAll($sql);
    }

    public function findPostCategories(int $postId): array
    {
        $sql = "
            SELECT c.* 
            FROM categories c
            INNER JOIN post_categories pc ON c.id = pc.category_id
            WHERE pc.post_id = ?
            ORDER BY c.name ASC
        ";
        return $this->db->fetchAll($sql, [$postId]);
    }

    public function create(array $data): int
    {
        $category = $this->categoryFactory->create($data);
        return $this->categoryManager->save($category);
    }
}
