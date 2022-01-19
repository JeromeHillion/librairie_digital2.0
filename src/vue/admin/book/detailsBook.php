<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="containerGeneral">

    <?php if ($book) :?>

    <div class="container">
        <h2><?= $book['data']['categories']?></h2>
        <h1><?= $book['data']['title']?></h1>
        <h3>de <?= $book['data']['authors']?></h3>
        <h2><?= $book['data']['publishedDate']?></h2>
        <img src="<?= $book['data']['imageLinks']?>" alt="thumbnail">
        <p><?= $book['data']['description']?></p>
        <hr>

        <h2>Description du produit</h2>
        <p>Nombre de pages: <?= $book['data']['pageCount']?></p>
        <p>ISBN: <?= $book['data']['isbn']?></p>
        <p>Langue: <?= $book['data']['language']?></p>
        <p>Genre: <?= $book['data']['categories']?></p>


        <input type="submit" value="Ajouter">
    </div>
    <?php endif;?>

</div>
</body>
</html>
