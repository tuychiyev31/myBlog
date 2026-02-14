<?php

namespace App\Services;

use App\Repositories\PostRepositoryInterface;
use App\Database\Database;

class PostService
{
    private PostRepositoryInterface $postRepository;
    private Database $db;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->db = Database::getInstance();
    }

    /**
     * Create post with categories (with transaction)
     */
    public function createPostWithCategories(array $postData, array $categoryIds): int
    {
        try {
            $this->db->getConnection()->beginTransaction();

            $postId = $this->postRepository->create($postData);
            
            if (!empty($categoryIds)) {
                $this->postRepository->attachCategories($postId, $categoryIds);
            }

            $this->db->getConnection()->commit();

            return $postId;

        } catch (\Exception $e) {
            $this->db->getConnection()->rollBack();
            throw $e;
        }
    }

    /**
     * Get post with view increment
     */
    public function getPostAndIncrementViews(int $id): ?array
    {
        $post = $this->postRepository->findById($id);
        
        if ($post) {
            $this->postRepository->incrementViews($id);
            $post['views']++;
        }
        
        return $post;
    }
}
