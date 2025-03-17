<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Boek Details</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Titel:</strong> <?php echo htmlspecialchars($book->titel, ENT_QUOTES, 'UTF-8'); ?></li>
        <li class="list-group-item"><strong>Auteur:</strong> <?php echo htmlspecialchars($book->auteur, ENT_QUOTES, 'UTF-8'); ?></li>
        <li class="list-group-item"><strong>Prijs:</strong> €<?php echo htmlspecialchars($book->prijs, ENT_QUOTES, 'UTF-8'); ?></li>
        <li class="list-group-item"><strong>ID:</strong> <?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?></li>
    </ul>
    <a href="/webdev/MVC1/public/index.php?url=books" class="btn btn-primary mt-3">Terug naar Boekenlijst</a>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
