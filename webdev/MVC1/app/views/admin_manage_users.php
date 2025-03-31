<?php include_once __DIR__ . '/header.php'; ?>
<div class="container mt-4">
    <h1>Gebruikers Beheren</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Gebruikersnaam</th>
                <th scope="col">E-mail</th>
                <th scope="col">Admin</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo $user['is_admin'] ? 'Ja' : 'Nee'; ?></td>
                <td>
                    <form action="/webdev/MVC1/public/index.php?url=admin&action=deleteUser&id=<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>" method="post" style="display:inline;">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                    </form>
                    <?php if ($user['is_admin']): ?>
                        <form action="/webdev/MVC1/public/index.php?url=admin&action=revokeAdmin&id=<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>" method="post" style="display:inline;">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <button type="submit" class="btn btn-warning btn-sm">Adminrechten Intrekken</button>
                        </form>
                    <?php else: ?>
                        <form action="/webdev/MVC1/public/index.php?url=admin&action=makeAdmin&id=<?php echo htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>" method="post" style="display:inline;">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <button type="submit" class="btn btn-success btn-sm">Maak Admin</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include_once __DIR__ . '/footer.php'; ?>
