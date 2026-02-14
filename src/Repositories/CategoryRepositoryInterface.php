<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    /**
     * Find all categories
     */
    public function findAll(): array;
    
    /**
     * Find category by ID
     */
    public function findById(int $id): ?array;
    
    /**
     * Find categories that have posts
     */
    public function findWithPosts(): array;
    
    /**
     * Find categories for a specific post
     */
    public function findPostCategories(int $postId): array;
    
    /**
     * Create new category
     */
    public function create(array $data): int;
}
