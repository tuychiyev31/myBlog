<?php

namespace App\Repositories;

interface PostRepositoryInterface
{
    /**
     * Find post by ID
     */
    public function findById(int $id): ?array;
    
    /**
     * Find latest posts by category
     */
    public function findLatestByCategory(int $categoryId, int $limit = 3): array;
    
    /**
     * Find posts by category with pagination
     */
    public function findByCategory(
        int $categoryId,
        string $orderBy = 'created_at',
        int $page = 1,
        int $perPage = 9
    ): array;
    
    /**
     * Count posts in category
     */
    public function countByCategory(int $categoryId): int;
    
    /**
     * Find similar posts
     */
    public function findSimilar(int $postId, int $limit = 3): array;
    
    /**
     * Create new post
     */
    public function createWithCategories(array $data, ?string $imageUrl, array $categoryIds): int;
    
    /**
     * Increment view counter
     */
    public function incrementViews(int $id): void;
    
    /**
     * Get all posts
     */
    public function getAll(): array;
}
