<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../public/css/normalize.css">

    <title>Catalogue</title>
</head>

<body>
<div class="containerGeneral">

    <div class="container">
        <div class="book">
            <h1>Rechercher un livre</h1>


            <form action="BookController.php" method="POST">
                <h3 class="primary-color">Taper le nom du livre que vous souhaitez rechercher</h3>
                <div class="name">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name">
                    <span id="nameEmpty">Le champs est vide !</span>
                    <input type="submit">
                </div>

            </form>

        </div>

        <div class="result">
            <h1>Résultat de la recherche</h1>
            <?php if ($books) : ?>
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
                    <tbody id="dataCategories">

                    <?php foreach ($books as $book):?>
                        <tr>
                           <td><?= $book['isbn'];?></td>
                            <td><?= $book['name'];?>
                            <td><?=  $book['publication'];?></td>
                            <?php if (($book['categorie'] )):?>
                            <?php foreach ($book['categorie'] as $categorie):?>
                            <td><?= $categorie; ?></td>
                            <?php endforeach;?>
                            <?php else:?>
                            <td>non comuniqué</td>
                            <?php endif;?>
                            <td>
                            <?php foreach ($book['authors'] as $author):?>
                            <?= $author.", ";?>
                            <?php endforeach;?>
                            </td>


                            <td>
                                <form action="DetailsBookController.php" method="POST">
                                <input type="hidden" name="isbn" value="<?= $book['isbn']?>">
                                <input  class="btnDetail" type="submit" value="détails">
                                </form>
                                <form action="../../../repository/CategoryRepository.php" method="POST">
                                    <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                                    <input class="btnAdd" type="submit" value="Ajouter">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>

                    </tbody>
                </table>
            <?php endif;?>
        </div>

    </div>
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/Admin/book.js"></script>
</body>

</html>