<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Welkom bij BookBistro!</h1>
    <ul class="list-group">
        <?php foreach ($books as $book): ?>
        <li class="list-group-item">
            <strong><?php echo $book->titel; ?></strong><br>
            Auteur: <?php echo $book->auteur; ?><br>
            Prijs: €<?php echo $book->prijs; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
