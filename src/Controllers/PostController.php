<?php

namespace App\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Services\PostService;

class PostController
{
    private $smarty;
    private CategoryRepository $categoryRepository;
    private PostRepository $postRepository;
    private PostService $postService;

    public function __construct($smarty)
    {
        $this->smarty = $smarty;
        $this->categoryRepository = new CategoryRepository();
        $this->postRepository = new PostRepository();
        $this->postService = new PostService($this->postRepository);
    }

    public function show(string $id): void
    {
        $postId = (int)$id;

        $post = $this->postService->getPostAndIncrementViews($postId);

        if (!$post) {
            http_response_code(404);
            echo "404 - Post not found";
            return;
        }

        $categories = $this->categoryRepository->findPostCategories($postId);
        $similarPosts = $this->postRepository->findSimilar($postId, 3);

        $this->smarty->assign('post', $post);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('similarPosts', $similarPosts);

        $this->smarty->display('post.tpl');
    }
}