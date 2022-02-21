<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../public/css/admin/templates/menu.css">
    <link rel="stylesheet" href="../../../public/css/admin/book/addBook.css">
    <title>Librairie digital - Ajouter un livre</title>
</head>
<body>
<div class="containerGeneral">
    <?php
    include_once '../../vue/admin/templates/menu.php';
    ?>
    <div class="container">
        <div class="exist">
            <p>Le livre existe déjà dans la base de données !</p>
            <a class="return" href="SearchBookController.php">retour</a>
        </div>
        <?php if ($book): ?>
            <div class="form">
                <h3>Ajouter un livre</h3>
                <form action="AddBookController.php" method="POST">

                    <label for="isbn">
                        ISBN
                        <input type="text" name="isbn" value="<?= $book['data']['isbn'] ?>">
                    </label>

                    <label for="name">
                        Nom
                        <input type="text" name="name" value="<?= $book['data']['title'] ?>">
                    </label>

                    <label for="publication">
                        Date de publication
                        <input type="text" name="publication" value="<?= $book['data']['publishedDate'] ?>">
                    </label>

                    <label for="cover">
                        Url de l'image
                        <input type="text" name="cover" value="<?= $book['data']['imageLinks'] ?>">
                    </label>

                    <label for="summary">
                        Résumé
                        <textarea name="summary" id="" cols="30"
                                  rows="10"><?= $book['data']['description'] ?></textarea>

                    </label>

                    <label for="category">
                        Catégorie
                        <input type="text" name="category" value="<?= $book['data']['categories'] ?>">
                    </label>

                    <label for="author">
                        Auteur(e)(s)
                        <input type="text" name="author" value="<?= $book['data']['authors'][0] ?>">
                    </label>
                    <input class="btnAdd" type="submit" value="Ajouter">
                </form>
            </div>
        <?php endif ?>
    </div>
</div>
<script>
    let container = document.querySelector(".container");
    console.log(container);
    if (container.childElementCount < 2) {
        let exist = document.querySelector(".exist");
        exist.style.display = "flex";

        /*let aReturn = document.querySelector(".return");
        aReturn.href = "SearchBookController.php"*/
    }
</script>
</body>
</html>
