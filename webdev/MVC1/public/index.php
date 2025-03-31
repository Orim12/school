<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/BooksController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
include_once __DIR__ . '/../app/views/header.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = null;

switch ($url) {
    case 'books':
        $controller = new BooksController();
        if ($action === 'create') {
            $controller->create();
        } elseif ($action === 'store') {
            $controller->store();
        } elseif ($action === 'edit') {
            $controller->edit($id);
        } elseif ($action === 'update') {
            $controller->update($id);
        } elseif ($action === 'delete') {
            $controller->delete($id);
        } elseif ($action === 'show') {
            $controller->show($id);
        } elseif ($action === 'addComment') {
            $controller->addComment($id);
        } else {
            $controller->index();
        }
        break;

    case 'admin':
        $controller = new AdminController();
        if ($action === 'manageUsers') {
            $controller->manageUsers();
        } elseif ($action === 'deleteUser' && $id) {
            $controller->deleteUser($id);
        } elseif ($action === 'makeAdmin' && $id) {
            $controller->makeAdmin($id);
        } elseif ($action === 'revokeAdmin' && $id) {
            $controller->revokeAdmin($id);
        } elseif ($action === 'manageBooks') {
            $controller->manageBooks();
        } elseif ($action === 'deleteBook' && $id) {
            $controller->deleteBook($id);
        } elseif ($action === null) {
            $controller->dashboard();
        } else {
            header("HTTP/1.0 404 Not Found");
            require_once __DIR__ . '/../app/views/404.php';
            exit();
        }
        break;

    case 'auth':
        $controller = new AuthController();
        if ($action === 'login') {
            $controller->login();
        } elseif ($action === 'register') {
            $controller->register();
        } elseif ($action === 'logout') {
            $controller->logout();
        } else {
            header("HTTP/1.0 404 Not Found");
            require_once __DIR__ . '/../app/views/404.php';
            exit();
        }
        break;

    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ . '/../app/views/404.php';
        exit();
}

include_once __DIR__ . '/../app/views/footer.php';
?>