<?php
class Book {
    public $titel;
    public $auteur;
    public $prijs;

    public function __construct($titel, $auteur, $prijs) {
        $this->titel = $titel;
        $this->auteur = $auteur;
        $this->prijs = $prijs;
    }

    public function save() {
        // Hier zou je normaal gesproken de code plaatsen om het boek op te slaan in de database
    }

    public static function getAllBooks() {
        $books = [
            new Book('Boek 1', 'Auteur 1', 10.99),
            new Book('Boek 2', 'Auteur 2', 12.99),
            new Book('Boek 3', 'Auteur 3', 15.50)
        ];
        return $books;
    }
}
?>