<!DOCTYPE html>
<html>
<head>
    <title>Boekenlijst</title>
</head>
<body>
    <h1>Boekenlijst</h1>
    <a href="/webdev/MVC1/public/index.php?url=books&action=create">Nieuw Boek</a>
    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Auteur</th>
            <th>Acties</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book->titel; ?></td>
            <td><?php echo $book->auteur; ?></td>
            <td>
                <a href="/webdev/MVC1/public/index.php?url=books&action=edit&id=<?php echo $book->id; ?>">Bewerken</a>
                <a href="/webdev/MVC1/public/index.php?url=books&action=delete&id=<?php echo $book->id; ?>">Verwijderen</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
