<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use Smarty;

class CategoryController
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
        $categoryId = (int)$id;
   
        $category = $this->categoryModel->getById($categoryId);
        if (!$category) {
            http_response_code(404);
            echo "Category not found";
            return;
        }
        
        $orderBy = $_GET['sort'] ?? 'created_at';
        $page = (int)($_GET['page'] ?? 1);
        $perPage = 9;
        
        $posts = $this->postModel->getByCategory($categoryId, $orderBy, $page, $perPage);
        
        $totalPosts = $this->postModel->getCountByCategory($categoryId);
        $totalPages = ceil($totalPosts / $perPage);

        $this->smarty->assign('category', $category);
        $this->smarty->assign('posts', $posts);
        $this->smarty->assign('currentPage', $page);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->assign('orderBy', $orderBy);
        
        $this->smarty->display('category.tpl');
    }
}

