<?php
class Book {
    public $id;
    public $titel;
    public $auteur;
    public $prijs;

    private static function getConnection() {
        $host = 'localhost';
        $db = 'Bookbistro';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function __construct($titel, $auteur, $prijs, $id = null) {
        $this->id = $id;
        $this->titel = $titel;
        $this->auteur = $auteur;
        $this->prijs = $prijs;
    }

    public function save() {
        $pdo = self::getConnection();
        if ($this->id) {
            $stmt = $pdo->prepare('UPDATE books SET titel = ?, auteur = ?, prijs = ? WHERE id = ?');
            $stmt->execute([$this->titel, $this->auteur, $this->prijs, $this->id]);
        } else {
            $stmt = $pdo->prepare('INSERT INTO books (titel, auteur, prijs) VALUES (?, ?, ?)');
            $stmt->execute([$this->titel, $this->auteur, $this->prijs]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public static function getBooks($sort = null, $filter = null, $search = null) {
        $pdo = self::getConnection();
        $query = 'SELECT * FROM books WHERE 1=1';
        $params = [];

        if ($filter) {
            $query .= ' AND auteur = ?';
            $params[] = $filter;
        }

        if ($search) {
            $query .= ' AND (titel LIKE ? OR auteur LIKE ?)';
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        if ($sort) {
            $query .= ' ORDER BY ' . ($sort === 'titel' ? 'titel' : 'auteur');
        }

        $stmt = $pdo->prepare($query);
        $stmt->execute($params);

        $books = [];
        while ($row = $stmt->fetch()) {
            $books[] = new Book($row['titel'], $row['auteur'], $row['prijs'], $row['id']);
        }
        return $books;
    }

    public static function getBookById($id) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM books WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Book($row['titel'], $row['auteur'], $row['prijs'], $row['id']);
        } else {
            return null;
        }
    }

    public static function deleteById($id) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('DELETE FROM books WHERE id = ?');
        $stmt->execute([$id]);
    }

    public static function addComment($bookId, $comment, $rating) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('INSERT INTO comments (book_id, comment, rating, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$bookId, $comment, $rating]);
    }

    public static function getComments($bookId) {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM comments WHERE book_id = ? ORDER BY created_at DESC');
        $stmt->execute([$bookId]);
        return $stmt->fetchAll();
    }

    public static function getAllBooks() {
        $pdo = self::getConnection();
        $stmt = $pdo->query('SELECT * FROM books');
        $books = [];
        while ($row = $stmt->fetch()) {
            $books[] = new Book($row['titel'], $row['auteur'], $row['prijs'], $row['id']);
        }
        return $books;
    }
}
?>