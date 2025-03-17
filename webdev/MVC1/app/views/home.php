<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Welkom bij BookBistro!</h1>
    <ul class="list-group">
        <?php foreach ($books as $book): ?>
        <li class="list-group-item">
            <strong><?php echo htmlspecialchars($book->titel, ENT_QUOTES, 'UTF-8'); ?></strong><br>
            Auteur: <?php echo htmlspecialchars($book->auteur, ENT_QUOTES, 'UTF-8'); ?><br>
            Prijs: €<?php echo htmlspecialchars($book->prijs, ENT_QUOTES, 'UTF-8'); ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
