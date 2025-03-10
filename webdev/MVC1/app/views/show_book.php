<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Boek Details</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Titel:</strong> <?php echo $book->titel; ?></li>
        <li class="list-group-item"><strong>Auteur:</strong> <?php echo $book->auteur; ?></li>
        <li class="list-group-item"><strong>Prijs:</strong> €<?php echo $book->prijs; ?></li>
        <li class="list-group-item"><strong>ID:</strong> <?php echo $book->id; ?></li>
    </ul>
    <a href="/webdev/MVC1/public/index.php?url=books" class="btn btn-primary mt-3">Terug naar Boekenlijst</a>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
