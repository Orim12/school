<?php

require_once __DIR__ . '/../models/Book.php';

class BooksController {
    // Database columns for the books table:
    // id INT AUTO_INCREMENT PRIMARY KEY
    // titel VARCHAR(255)
    // auteur VARCHAR(255)
    // prijs DECIMAL(10, 2)

    public function index() {
        $sort = $_GET['sort'] ?? null;
        $filter = $_GET['filter'] ?? null;
        $search = $_GET['search'] ?? null;

        $books = Book::getBooks($sort, $filter, $search);
        require __DIR__ . '/../views/books.php';
    }

    public function create() {
        require __DIR__ . '/../views/create_book.php';
    }

    public function store() {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Ongeautoriseerd verzoek.");
        }
        $book = new Book($_POST['titel'], $_POST['auteur'], $_POST['prijs']);
        $book->save();
        header('Location: /webdev/MVC1/public/index.php?url=books');
    }

    public function show($id) {
        $book = Book::getBookById($id);
        require __DIR__ . '/../views/show_book.php';
    }

    public function edit($id) {
        $book = Book::getBookById($id);
        require __DIR__ . '/../views/edit_book.php';
    }

    public function update($id) {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Ongeautoriseerd verzoek.");
        }
        $book = Book::getBookById($id);
        $book->titel = $_POST['titel'];
        $book->auteur = $_POST['auteur'];
        $book->prijs = $_POST['prijs'];
        $book->save();
        header('Location: /webdev/MVC1/public/index.php?url=books');
    }

    public function delete($id) {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Ongeautoriseerd verzoek.");
        }
        Book::deleteById($id);
        header('Location: /webdev/MVC1/public/index.php?url=books');
    }

    public function addComment($bookId) {
        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die("Ongeautoriseerd verzoek.");
        }
        if (!$bookId) {
            die("Boek ID ontbreekt.");
        }
        $comment = $_POST['comment'] ?? null;
        $rating = $_POST['rating'] ?? null;

        if (!$comment || !$rating) {
            die("Reactie en beoordeling zijn verplicht.");
        }

        Book::addComment($bookId, $comment, $rating);
        header('Location: /webdev/MVC1/public/index.php?url=books&action=show&id=' . $bookId);
        exit();
    }
}
?>
