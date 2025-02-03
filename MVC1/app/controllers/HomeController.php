<?php
require_once '../models/Book.php';

class HomeController {
    public function index() {
        // Haal alle boeken op via het Book model
        $books = Book::getAllBooks();

        // Laad de view en geef de boeken door aan de view
        require_once '../views/home.php';
    }
}
?>