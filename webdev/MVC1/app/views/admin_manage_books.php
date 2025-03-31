<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Boeken Beheren</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titel</th>
                <th scope="col">Auteur</th>
                <th scope="col">Prijs</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($book->titel, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($book->auteur, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>€<?php echo htmlspecialchars($book->prijs, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <form action="/webdev/MVC1/public/index.php?url=admin&action=deleteBook&id=<?php echo htmlspecialchars($book->id, ENT_QUOTES, 'UTF-8'); ?>" method="post" style="display:inline;">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
