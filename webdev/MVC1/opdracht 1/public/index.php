<?php

require_once '../app/controllers/HomeController.php';

$controller = new HomeController();
$books = $controller->getBooks();

?>
<!DOCTYPE html>
<html>
<head>
    <title>BookBistro</title>
</head>
<body>
    <h1>Welkom bij BookBistro!</h1>
    <ul>
        <?php foreach ($books as $book): ?>
        <li>
            <strong><?php echo $book->titel; ?></strong><br>
            Auteur: <?php echo $book->auteur; ?><br>
            Prijs: €<?php echo $book->prijs; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>