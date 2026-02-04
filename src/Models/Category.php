<?php

namespace App\Models;

use App\Database\Database;
use App\Factory\CategoryFactory;
use App\Manager\CategoryManager;

class Category
{
    private Database $db;
    private CategoryFactory $categoryFactory;
    private CategoryManager $categoryManager;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->categoryFactory = new CategoryFactory();
        $this->categoryManager = new CategoryManager();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM categories ORDER BY name ASC";
        
        return $this->db->fetchAll($sql);
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT * FROM categories WHERE id = ?";
        
        return $this->db->fetchOne($sql, [$id]);
    }

    public function getCategoriesWithPosts(): array
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

    public function getPostCategories(int $postId): array
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
