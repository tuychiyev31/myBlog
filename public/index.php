<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Helpers\Router;
use App\Controllers\HomeController;
use App\Controllers\CategoryController;
use App\Controllers\PostController;

$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/../templates/');
$smarty->setCompileDir(__DIR__ . '/../templates_c/');
$smarty->setCacheDir(__DIR__ . '/../cache/');
$smarty->setConfigDir(__DIR__ . '/../configs/');

$homeController = new HomeController($smarty);
$categoryController = new CategoryController($smarty);
$postController = new PostController($smarty);
$adminController = new AdminController($smarty);

$router = new Router();

$router->get('/', function () use ($homeController) {
    $homeController->index();
});

$router->get('/category/{id}', function ($id) use ($categoryController) {
    $categoryController->show($id);
});

$router->get('/post/{id}', function ($id) use ($postController) {
    $postController->show($id);
});

$router->get('/admin/login', function () use ($adminController) {
    $adminController->login();
});

$router->post('/admin/authenticate', function () use ($adminController) {
    $adminController->authenticate();
});

$router->get('/admin/dashboard', function () use ($adminController) {
    $adminController->dashboard();
});

$router->get('/admin/post/create', function () use ($adminController) {
    $adminController->createForm();
});

$router->post('/admin/post/store', function () use ($adminController) {
    $adminController->store();
});

$router->run();

