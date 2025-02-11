<!DOCTYPE html>
<html>
<head>
    <title>Boekenlijst</title>
</head>
<body>
    <h1>Boekenlijst</h1>
    <table border="1">
        <tr>
            <th>Titel</th>
            <th>Auteur</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book->titel; ?></td>
            <td><?php echo $book->auteur; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
