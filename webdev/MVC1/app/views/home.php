<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Welkom bij BookBistro!</h1>
    <div class="row">
        <?php foreach ($books as $book): ?>
        <div class="col-md-4 mb-4">
            <a href="/webdev/MVC1/public/index.php?url=books&action=show&id=<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" class="text-decoration-none text-dark">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($book->titel, ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="card-text"><strong>Auteur:</strong> <?php echo htmlspecialchars($book->auteur, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text"><strong>Prijs:</strong> €<?php echo htmlspecialchars($book->prijs, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
