<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../../public/css/admin/templates/menu2.css">
    <link rel="stylesheet" href="../../../../public/css/admin/book/book.css">


    <title>Librairie digital - Ajout livre</title>
</head>

<body>
<div class="containerGeneral">
    <?php
    include_once '../../../vue/admin/templates/menu2.php';
    ?>
    <div class="container">
<div class="search">
        <h1>Rechercher un livre</h1>

        <form id="search" action="BookController.php" method="POST">
            <h3>Taper le nom du livre que vous souhaitez rechercher</h3>
            <label for="name"></label>
            <input type="text" name="name" id="name">
            <input type="submit">
            <span id="error"></span>
        </form>
</div>
        <div class="result">
            <?php if ($books) : ?>
                <h1>Résultat de la recherche</h1>
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

                            <td><?= $book['isbn']; ?></td>
                            <td><?= $book['name']; ?>
                            <td><?= $book['publication']; ?></td>

                            <?php if ($book['categorie']): ?>
                                <?php foreach ($book['categorie'] as $categorie): ?>
                                    <td><?= $categorie; ?></td>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <td>non comuniqué</td>
                            <?php endif; ?>

                            <?php if ($book['authors']): ?>
                                <td>
                                <?php foreach ($book['authors'] as $author): ?>
                                   <?= $author; ?>
                                <?php endforeach; ?>
                                </td>
                            <?php else: ?>
                                <td>non comuniqué</td>
                            <?php endif; ?>

                            <td>
                                <form action="DetailsBookController.php" method="POST">
                                    <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                                    <input class="btnDetail" type="submit" value="détails">
                                </form>
                                <form action="crud/addBookFormController.php" method="POST">
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

    <script src="../../../public/js/admin/book/book.js"></script>
</body>

</html>