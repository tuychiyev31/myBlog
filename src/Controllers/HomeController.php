<?php

namespace App\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class HomeController
{
    private $smarty;
    private CategoryRepository $categoryRepository;
    private PostRepository $postRepository;

    public function __construct($smarty)
    {
        $this->smarty = $smarty;
        $this->categoryRepository = new CategoryRepository();
        $this->postRepository = new PostRepository();
    }

    public function index(): void
    {
        $categories = $this->categoryRepository->findWithPosts();

        $categoriesWithPosts = [];

        foreach ($categories as $category) {
            $posts = $this->postRepository->findLatestByCategory($category['id'], 3);

            $categoriesWithPosts[] = [
                'category' => $category,
                'posts' => $posts
            ];
        }

        $this->smarty->assign('categoriesWithPosts', $categoriesWithPosts);
        $this->smarty->display('home.tpl');
    }
}