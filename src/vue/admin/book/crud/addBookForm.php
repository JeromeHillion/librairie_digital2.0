<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../../public/css/admin/book/addBook.css">
    <title>Librairie digital - Ajouter un livre</title>
</head>
<body>
<div class="containerGeneral">
    <div class="container">
        <div class="form">
        <form action="AddBookController" method="POST">

            <label for="isbn">
            ISBN
                <input type="text" name="isbn" value="<?= $book['data']['isbn']?>">
            </label>

            <label for="name">
            nom
                <input type="text" name="name" value="<?= $book['data']['title']?>">
            </label>

            <label for="publication">
            date de publication
                <input type="text" name="publication" value="<?= $book['data']['publishedDate']?>">
            </label>

            <label for="cover">
            url de l'image
                <input type="text" name="cover" value="<?= $book['data']['imageLinks']?>">
            </label>

            <label for="summary">
            résumé
                <textarea name="summary" id="" cols="30" rows="10">
                    <?= $book['data']['description']?>
                </textarea>

            </label>

            <label for="category">
            catégorie
                <input type="text" name="category" value="<?= $book['data']['categories']?>">
            </label>

            <label for="author">
            auteur(e)(s)
                <input type="text" name="author" value="<?= $book['data']['authors']?>">
            </label>
            <input type="submit" value="Ajouter">
        </form>
        </div>
    </div>
</div>
</body>
</html>
