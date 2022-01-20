<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public/css/normalize.css">
    <title>Librairie digital - Détails livre</title>
</head>
<body>
<div class="containerGeneral">

    <?php if ($book) :?>

    <div class="container">
        <?php if ($book['data']['language'] === "Français") :?>
        <h2><?= $book['data']['categories']?></h2>
        <h1><?= $book['data']['title']?></h1>
        <h3>de <?= $book['data']['authors']?></h3>
        <h2><?= $book['data']['publishedDate']?></h2>
        <img src="<?= $book['data']['imageLinks']?>" alt="thumbnail">
        <h2>Résumé</h2>
        <p> <?= $book['data']['description']?></p>
        <?php endif; ?>

        <?php if ($book['data']['language'] === "English") :?>
        <h2><?= $book['data']['categories']?></h2>
        <h1><?= $book['data']['title']?></h1>
        <h3>By: <?= $book['data']['authors']?></h3>
        <h2><?= $book['data']['publishedDate']?></h2>
        <img src="<?= $book['data']['imageLinks']?>" alt="thumbnail">
            <h2>Summary</h2>
        <p><?= $book['data']['description']?></p>
        <?php endif; ?>
        <hr>

        <?php if ($book['data']['language'] === "Français") :?>
            <h2>Description du produit</h2>
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


    </div>
    <?php endif;?>

</div>
</body>
</html>
