<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../../public/css/admin/templates/menu2.css">
    <link rel="stylesheet" href="../../../../public/css/admin/book/catalog.css">
    <title>Catalogue</title>
</head>
<body>
<div class="containerGeneral">
    <?php
    include_once '../../../vue/admin/templates/menu2.php';
    ?>
    <div class="container">
        <div class="section">
            <h3>Catalogue</h3>
        </div>
        <?php if ($books): ?>
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
                        <td><?= $book['category'] ?></td>
                        <td> <?= $book['author'] ?>  </td>

                        <td>
                            <form action="DetailsBookController.php" method="POST">
                                <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                                <input class="btnDetail" type="submit" value="détails">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        <?php endif; ?>

    </div>
</div>
</body>
</html>
