<?php

namespace App\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Services\PostService;
use App\Helpers\FileUploader;

class AdminController
{
    private $smarty;
    private CategoryRepository $categoryRepository;
    private PostRepository $postRepository;
    private PostService $postService;
    private FileUploader $fileUploader;

    // Simple authentication (for testing)
    private string $adminUsername = 'admin';
    private string $adminPassword = 'admin123';

    public function __construct($smarty)
    {
        $this->smarty = $smarty;
        $this->categoryRepository = new CategoryRepository();
        $this->postRepository = new PostRepository();
        $this->postService = new PostService($this->postRepository);
        $this->fileUploader = new FileUploader();
    }

    public function login(): void
    {
        $this->smarty->display('admin/login.tpl');
    }

    public function authenticate(): void
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $this->adminUsername && $password === $this->adminPassword) {
            session_start();
            $_SESSION['admin_logged_in'] = true;

            header('Location: /admin/dashboard');
            exit;
        } else {
            $this->smarty->assign('error', 'Invalid username or password');
            $this->smarty->display('admin/login.tpl');
        }
    }

    private function checkAuth(): void
    {
        session_start();
        if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
            header('Location: /admin/login');
            exit;
        }
    }

    public function dashboard(): void
    {
        $this->checkAuth();

        $posts = $this->postRepository->getAll();

        $this->smarty->assign('posts', $posts);
        $this->smarty->display('admin/dashboard.tpl');
    }

    public function createForm(): void
    {
        $this->checkAuth();

        $categories = $this->categoryRepository->findAll();

        $this->smarty->assign('categories', $categories);
        $this->smarty->display('admin/post-create.tpl');
    }

    public function store(): void
    {
        $this->checkAuth();

        try {
            // Upload image if provided
            $imageUrl = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageUrl = $this->fileUploader->upload($_FILES['image']);
            }

            // Prepare post data
            $postData = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
                'image' => $imageUrl
            ];

            // Get category IDs
            $categoryIds = $_POST['categories'] ?? [];

            // Create post with categories (using Service with transaction)
            $this->postService->createPostWithCategories($postData, $categoryIds);

            header('Location: /admin/dashboard');
            exit;

        } catch (\Exception $e) {
            $categories = $this->categoryRepository->findAll();
            $this->smarty->assign('categories', $categories);
            $this->smarty->assign('error', $e->getMessage());
            $this->smarty->display('admin/post-create.tpl');
        }
    }
}