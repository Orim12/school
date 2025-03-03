<?php

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/BooksController.php';

include_once __DIR__ . '/../app/views/header.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

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
        } else {
            $controller->index();
        }
        break;
    case 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
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
