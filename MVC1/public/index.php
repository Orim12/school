<?php
// Autoload classes (je zou dit met Composer kunnen regelen)
require_once '../app/controllers/HomeController.php';

// Maak een nieuwe instantie van de HomeController
$controller = new HomeController();

// Roep de index-methode van de controller aan
$controller->index();
?>