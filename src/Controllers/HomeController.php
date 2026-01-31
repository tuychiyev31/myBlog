<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use Smarty;

class HomeController
{
    private Smarty $smarty;
    private Category $categoryModel;
    private Post $postModel;

    public function __construct($smarty)
    {
        $this->smarty = $smarty;
        $this->categoryModel = new Category();
        $this->postModel = new Post();
    }

    /**
     * @throws \SmartyException
     */
    public function index(): void
    {
        $categories = $this->categoryModel->getCategoriesWithPosts();

        // DEBUG
        error_log("Categories count: " . count($categories));

        $categoriesWithPosts = [];

        foreach ($categories as $category) {
            $posts = $this->postModel->getLatestByCategory($category['id'], 3);

            // DEBUG
            error_log("Category {$category['name']}: " . count($posts) . " posts");

            $categoriesWithPosts[] = [
                'category' => $category,
                'posts' => $posts
            ];
        }

        error_log("Total categoriesWithPosts: " . count($categoriesWithPosts));
        error_log("Data: " . print_r($categoriesWithPosts, true));

        $this->smarty->assign('categoriesWithPosts', $categoriesWithPosts);
        $this->smarty->display('home.tpl');
    }
}