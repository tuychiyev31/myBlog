<?php

namespace App\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

class CategoryController
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

    public function show(string $id): void
    {
        $categoryId = (int)$id;

        // Find category
        $category = $this->categoryRepository->findById($categoryId);

        if (!$category) {
            http_response_code(404);
            echo "404 - Category not found";
            return;
        }

        $orderBy = $_GET['sort'] ?? 'created_at';
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 9;

        $posts = $this->postRepository->findByCategory($categoryId, $orderBy, $page, $perPage);

        $totalPosts = $this->postRepository->countByCategory($categoryId);
        $totalPages = ceil($totalPosts / $perPage);

        $this->smarty->assign('category', $category);
        $this->smarty->assign('posts', $posts);
        $this->smarty->assign('orderBy', $orderBy);
        $this->smarty->assign('currentPage', $page);
        $this->smarty->assign('totalPages', $totalPages);

        $this->smarty->display('category.tpl');
    }
}