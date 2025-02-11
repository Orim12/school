<?php

require_once __DIR__ . '/../models/Book.php';

class BooksController {
    public function index() {
        $books = Book::getAllBooks();
        require '../views/books.php';
    }
}

?>
