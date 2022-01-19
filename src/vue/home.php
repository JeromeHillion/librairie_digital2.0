<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/normalize.css">
    <link rel="stylesheet" href="public/css/home.css">
    <title>Digital Library-Accueil</title>
</head>
<body>
<?php include_once 'fragment/header.phtml'?>

<div class="containerGeneral">
    <div class="container">
        <div class="categorieSection">
<h2>Catégories</h2>
                <?php
                foreach ($categories as $categorie){
                    ?>
                <a href="#"><?php echo $categorie['name'];?></a>
               <?php }
                ?>
        </div>


    <div class="bookSection">
        <h2>Nouveautés</h2>
        <div class="cards">
            <?php foreach ($books as $book) {
                ?>
                    <div class="card">
                        <img src="<?php echo $book['cover'] ?>" alt="">
                        <h4><?php echo nl2br($book['name']);?></h4>
                        <p><?php echo $book['publication'];?></p>
                        <a href="<?php echo $book['name'];?>/<?php echo $book['id'] ?>">Voir le détail</a>
                    </div>
            <?php }
            ?>
            
        </div>
    </div>
    </div>
</div>
</body>
</html>
