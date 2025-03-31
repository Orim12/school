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
    <h2>Reacties en Beoordelingen</h2>
    <ul class="list-group">
        <?php foreach (Book::getComments($book->id) as $comment): ?>
        <li class="list-group-item">
            <strong>Beoordeling:</strong> <?php echo htmlspecialchars($comment['rating'], ENT_QUOTES, 'UTF-8'); ?>/5<br>
            <strong>Reactie:</strong> <?php echo htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8'); ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <form action="/webdev/MVC1/public/index.php?url=books&action=addComment&id=<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" method="post" class="mt-3">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="mb-3">
            <label for="rating" class="form-label">Beoordeling (1-5):</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Reactie:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Plaatsen</button>
    </form>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
