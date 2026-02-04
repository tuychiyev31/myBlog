<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Helpers\FileUploader;

class AdminController
{
    private $smarty;
    private $categoryModel;
    private $postModel;
    private $fileUploader;

    private string $adminUsername = 'admin';
    private string $adminPassword = 'admin123';

    public function __construct($smarty)
    {
        $this->smarty = $smarty;
        $this->categoryModel = new Category();
        $this->postModel = new Post();
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
            $this->smarty->assign('error', 'Incorrect login or password');
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

        $posts = $this->postModel->getAll();

        $this->smarty->assign('posts', $posts);
        $this->smarty->display('admin/dashboard.tpl');
    }

    public function createForm(): void
    {
        $this->checkAuth();

        $categories = $this->categoryModel->getAll();

        $this->smarty->assign('categories', $categories);
        $this->smarty->display('admin/post-create.tpl');
    }

    public function store(): void
    {
        $this->checkAuth();

        try {
            $imageUrl = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageUrl = $this->fileUploader->upload($_FILES['image']);
            }

            $categoryIds = $_POST['categories'] ?? [];
            $this->postModel->createWithCategories($_POST, $imageUrl, $categoryIds);

            header('Location: /admin/dashboard');

            exit;
        } catch (\Exception $e) {
            $categories = $this->categoryModel->getAll();
            $this->smarty->assign('categories', $categories);
            $this->smarty->assign('error', $e->getMessage());
            $this->smarty->display('admin/post-create.tpl');
        }
    }
}