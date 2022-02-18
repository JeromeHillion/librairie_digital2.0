<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../public/css/admin/templates/menu2.css">
    <link rel="stylesheet" href="../../../public/css/admin/book/detailsBook.css">

    <title>Librairie digital - Détails livre</title>
</head>
<body>
<div class="containerGeneral">
    <?php
    include_once '../../vue/admin/templates/menu2.php';
    ?>
    <?php if ($book) : ?>

    <div class="container">
        <?php if ($book['data']['language'] === "Français") : ?>
        <div class="info">
            <div class="details">
                <p><?= "<span>Titre du livre : </span> " . $book['data']['title'] ?></p>
                <p><?= "<span>Catégorie : </span>" . $book['data']['categories'] ?></p>
                <p>
                    <?php foreach ($book['data']['authors'] as $author): ?>
                        <?= "<span>Auteur(e) : </span>" . $author ?>
                    <?php endforeach; ?>
                </p>
                <p><?= "<span> Date de publication : </span> " . $book['data']['publishedDate'] ?></p>
            </div>
            <div class="picture">
                <img src="<?= $book['data']['imageLinks'] ?>" alt="thumbnail">
            </div>
        </div>
        <div class="description">
            <h3>Résumé</h3>
            <p> <?= $book['data']['description'] ?></p>
            <?php endif; ?>

            <?php if ($book['data']['language'] === "Français") : ?>
                <h4>Description du produit</h4>
                <p><span>ISBN : </span> <?= $book['data']['isbn'] ?></p>
                <p><span>Nombre de pages : </span> <?= $book['data']['pageCount'] ?></p>
                <p><span>Langue : </span> <?= $book['data']['language'] ?></p>
                <p><span>Catégorie:</span> <?= $book['data']['categories'] ?></p>
            <?php endif; ?>
            <form action="addBookFormController.php" method="POST">
                <input type="hidden" name="isbn" value="<?= $book['data']['isbn'] ?>">
                <input class="btnAdd" type="submit" value="Ajouter">
            </form>
        </div>
        <?php if ($book['data']['language'] === "English") : ?>
        <div class="info"><div class="details">
        <p><?="<span> Title : </span>". $book['data']['title'] ?></p>
            <p><?="<span>Category : </span>". $book['data']['categories'] ?></p>
            <?php foreach ($book['data']['authors'] as $author): ?>
                <p><span>By: </span><?= $author ?></p>
            <?php endforeach; ?>
            <p><?= $book['data']['publishedDate'] ?></p>
        </div>
            <div class="picture">
            <img src="<?= $book['data']['imageLinks'] ?>" alt="thumbnail">
        </div>
        </div>
            <h2>Summary</h2>
        <div class="description">
            <p><?= $book['data']['description'] ?></p>
        <?php endif; ?>
        <?php if ($book['data']['language'] === "English") : ?>
            <h2>Product Description</h2>
            <p><span>ISBN : </span><?= $book['data']['isbn'] ?></p>
            <p><span>Number of pages : </span><?= $book['data']['pageCount'] ?></p>
            <p><span>Language :</span> <?= $book['data']['language'] ?></p>
            <p><span>Category : </span><?= $book['data']['categories'] ?></p>
            <form action="addBookFormController.php" method="POST">
                <input type="hidden" name="isbn" value="<?= $book['data']['isbn'] ?>">
                <input class="btnAdd" type="submit" value="Ajouter">
            </form>
        <?php endif; ?>
<?php endif; ?>
        </div>

    </div>
</div>
<script src="../../../../public/js/admin/templates/navbar.js"></script>
<script src="../../../../public/js/admin/templates/menu.js"></script>
</body>
</html>
