<?php

require_once '../app/controllers/HomeController.php';

$controller = new HomeController();
$books = $controller->getBooks();

?>