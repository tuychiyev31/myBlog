<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use Smarty;

class PostController
{
    private Smarty $smarty;
    private Category $categoryModel;
    private Post $postModel;

    public function __construct(Smarty $smarty)
    {
        $this->smarty = $smarty;
        $this->categoryModel = new Category();
        $this->postModel = new Post();
    }

    public function show(string $id): void
    {
    	$postId = (int)$id;
        $post = $this->postModel->getById($postId);
    
        if (!$post) {
            http_response_code(404);
            echo "Post not found";
            return;
        }

        $this->postModel->incrementViews($postId);
        $post['views']++;

        $categories = $this->categoryModel->getPostCategories($postId);
        $similarPosts = $this->postModel->getSimilar($postId, 3);
    
        $this->smarty->assign('post', $post);
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('similarPosts', $similarPosts);
        
        $this->smarty->display('post.tpl');
    }
}

