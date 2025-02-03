    <?php
class Book {
    private $title;
    private $author;
    private $price;

    // Constructor
    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    // Getters
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPrice() {
        return $this->price;
    }

    // Statische methode om boeken uit een array op te halen
    public static function getAllBooks() {
        // Hier gebruiken we een array in plaats van een database
        $books = [
            new Book("Boek 1", "Auteur 1", 10.99),
            new Book("Boek 2", "Auteur 2", 12.99),
            new Book("Boek 3", "Auteur 3", 15.50)
        ];

        return $books;
    }
}
?>