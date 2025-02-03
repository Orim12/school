<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>BookBistro - Welkom</title>
</head>
<body>
    <h1>Welkom bij BookBistro!</h1>
    <h2>Boeken in onze winkel:</h2>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <strong><?php echo $book->getTitle(); ?></strong><br>
                Auteur: <?php echo $book->getAuthor(); ?><br>
                Prijs: €<?php echo $book->getPrice(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>