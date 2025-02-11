<!DOCTYPE html>
<html>
<head>
    <title>Boek Bewerken</title>
</head>
<body>
    <h1>Boek Bewerken</h1>
    <form action="/webdev/MVC1/public/index.php?url=books&action=update&id=<?php echo $book->id; ?>" method="post">
        <label for="titel">Titel:</label>
        <input type="text" id="titel" name="titel" value="<?php echo $book->titel; ?>" required><br>
        <label for="auteur">Auteur:</label>
        <input type="text" id="auteur" name="auteur" value="<?php echo $book->auteur; ?>" required><br>
        <label for="prijs">Prijs:</label>
        <input type="text" id="prijs" name="prijs" value="<?php echo $book->prijs; ?>" required><br>
        <button type="submit">Opslaan</button>
    </form>
</body>
</html>
