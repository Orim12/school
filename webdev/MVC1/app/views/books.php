<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Boekenlijst</h1>
    <a href="/webdev/MVC1/public/index.php?url=books&action=create" class="btn btn-primary mb-3">Nieuw Boek</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titel</th>
                <th scope="col">Auteur</th>
                <th scope="col">Prijs</th>
                <th scope="col">id</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book->titel, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($book->auteur, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>€<?php echo htmlspecialchars($book->prijs, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <a href="/webdev/MVC1/public/index.php?url=books&action=edit&id=<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning btn-sm">Bewerken</a>
                    <a href="/webdev/MVC1/public/index.php?url=books&action=delete&id=<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger btn-sm">Verwijderen</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
