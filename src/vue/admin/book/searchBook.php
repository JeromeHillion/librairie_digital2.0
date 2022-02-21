<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../public/css/admin/templates/menu.css">
    <link rel="stylesheet" href="../../../public/css/admin/book/searchBook.css">


    <title>Librairie digital - Rechercher un livre</title>
</head>

<body>
<div class="containerGeneral">
    <?php
    include_once '../../vue/admin/templates/menu.php';
    ?>
    <div class="container">
        <div class="search">
            <h2>Rechercher un livre</h2>

            <form id="search" action="SearchBookController.php" method="POST">
                <h3>Taper le nom du livre que vous souhaitez rechercher</h3>
                <div class="inputSearch">
                <label for="name"></label>
                <input type="text" name="name" id="name">
                <button type="submit"><img src="../../../public/css/admin/icones/magnifying-glass.png" alt=""></button>
                </div>
                <span id="error"></span>
            </form>
        </div>
        <?php if ($books) : ?>
        <div class="result">
            <h3>Résultat de la recherche</h3>
            <table>
                <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Nom</th>
                    <th>Date de publication</th>
                    <th>Catégorie</th>
                    <th>Auteur(e)</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($books as $book): ?>
                    <tr>

                        <td class="isbn"><?= $book['isbn']; ?></td>
                        <td class="name"><?= $book['name']; ?>
                        <td class="publication"><?= $book['publication']; ?></td>

                        <?php if ($book['categorie']): ?>
                            <?php foreach ($book['categorie'] as $categorie): ?>
                                <td class="category"><?= $categorie; ?></td>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <td class="category">non comuniqué</td>
                        <?php endif; ?>

                        <?php if ($book['authors']): ?>
                            <td class="author">
                            <?php foreach ($book['authors'] as $author): ?>
                                 <?= $author; ?>
                                <?php endforeach; ?>
                            </td>
                        <?php else: ?>
                            <td class="author">non comuniqué</td>
                        <?php endif; ?>

                        <td>
                            <form action="DetailsBookController.php" method="POST">
                                <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                                <input class="btnDetail" type="submit" value="détails">
                            </form>
                            <form action="addBookFormController.php" method="POST">
                                <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                                <input class="btnAdd" type="submit" value="Ajouter">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
        </div>

    </div>

    <script src="../../../public/js/admin/book/searchBook.js"></script>
    <script src="../../../public/js/admin/templates/menu.js"></script>
</body>

</html>