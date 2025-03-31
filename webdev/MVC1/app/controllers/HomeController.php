<?php

require_once __DIR__ . '/../models/Book.php';

class HomeController {
    public function index() {
        $books = Book::getAllBooks();
        require __DIR__ . '/../views/home.php'; // Pass books to a view for rendering
    }
}

?>
