<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../../public/css/admin/templates/menu2.css">
    <link rel="stylesheet" href="../../../../public/css/admin/book/detailsBook.css">

    <title>Librairie digital - Détails livre</title>
</head>
<body>
<div class="containerGeneral">
    <?php
    include_once '../../../vue/admin/templates/menu2.php';
    ?>
    <?php if ($book) :?>

    <div class="container">
        <?php if ($book['data']['language'] === "Français") :?>
            <h3><?= $book['data']['title']?></h3>
            <p><?= $book['data']['categories']?></p>
        <p>De:
            <?php foreach ($book['data']['authors'] as $author):?>
               <?=$author ?>
            <?php endforeach;?>
            </p>
        <p><?= $book['data']['publishedDate']?></p>
        <img src="<?= $book['data']['imageLinks']?>" alt="thumbnail">
        <p>Résumé</p>
        <p> <?= $book['data']['description']?></p>
        <?php endif; ?>

        <?php if ($book['data']['language'] === "English") :?>
            <h3><?= $book['data']['title']?></h3>
            <p><?= $book['data']['categories']?></p>
        <?php foreach ($book['data']['authors'] as $author):?>
        <p>By: <?=$author ?></p>
        <?php endforeach;?>
        <p><?= $book['data']['publishedDate']?></p>
        <img src="<?= $book['data']['imageLinks']?>" alt="thumbnail">
            <h2>Summary</h2>
        <p><?= $book['data']['description']?></p>
        <?php endif; ?>
        <hr>

        <?php if ($book['data']['language'] === "Français") :?>
            <h3>Description du produit</h3>
            <p>ISBN: <?= $book['data']['isbn']?></p>
            <p>Nombre de pages: <?= $book['data']['pageCount']?></p>
            <p>Langue: <?= $book['data']['language']?></p>
            <p>Catégorie: <?= $book['data']['categories']?></p>
        <?php endif; ?>
        <?php if ($book['data']['language'] === "English") :?>
            <h2>Product Description</h2>
            <p>ISBN: <?= $book['data']['isbn']?></p>
            <p>Number of pages: <?= $book['data']['pageCount']?></p>
            <p>Language: <?= $book['data']['language']?></p>
            <p>Category: <?= $book['data']['categories']?></p>
        <?php endif; ?>


        <form action="crud/addBookFormController.php" method="POST">
            <input type="hidden" name="isbn" value="<?= $book['data']['isbn'] ?>">
            <input class="btnAdd" type="submit" value="Ajouter">
        </form>

    <?php endif;?>
    </div>
</div>
<script src="../../../../public/js/admin/templates/navbar.js"></script>
<script src="../../../../public/js/admin/templates/menu.js"></script>
</body>
</html>
