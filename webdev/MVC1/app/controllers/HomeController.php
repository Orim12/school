<?php

require_once '../models/Book.php';

class HomeController {
    public function getBooks() {
        return Book::getAllBooks();
    }
}

?>
