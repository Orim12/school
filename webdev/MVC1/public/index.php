<?php

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/BooksController.php';

include_once __DIR__ . '/../app/views/header.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controller = null;

switch ($url) {
    case 'books':
        $controller = new BooksController();
        if ($action == 'create') {
            $controller->create();
        } elseif ($action == 'store') {
            $controller->store();
        } elseif ($action == 'edit') {
            $controller->edit($id);
        } elseif ($action == 'update') {
            $controller->update($id);
        } elseif ($action == 'delete') {
            $controller->delete($id);
        } elseif ($action == 'show') {
            $controller->show($id);
        } elseif ($action === null) {
            $controller->index();
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
<!DOCTYPE html>
<html>
<head>
    <title>BookBistro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
</body>
</html>
