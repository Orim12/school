<?php

require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/BooksController.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'books':
        $controller = new BooksController();
        $controller->index();
        break;
    case 'home':
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>BookBistro</title>
</head>
<body>
    <h1>Welkom bij BookBistro!</h1>
    <ul>
        <?php if (isset($books)): ?>
            <?php foreach ($books as $book): ?>
            <li>
                <strong><?php echo htmlspecialchars($book->titel); ?></strong><br>
                Auteur: <?php echo htmlspecialchars($book->auteur); ?><br>
                Prijs: €<?php echo number_format($book->prijs, 2, ',', '.'); ?>
            </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Geen boeken beschikbaar.</p>
        <?php endif; ?>
    </ul>
</body>
</html>
