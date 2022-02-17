<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../public/css/admin/templates/menu2.css">
    <link rel="stylesheet" href="../../../public/css/admin/dashboard.css">

    <title>Document</title>
</head>
<body>

<div class="containerGeneral">
    <?php
    include_once 'templates/menu2.php';
    ?>
    <div class="container">
            <div class="date">
            </div>
            <div class="lastBook">
                <h3>Derniers livres ajoutés</h3>
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
                        <td class="category"><?= $book['category']; ?></td>
                        <td class="author"><?= $book['author']; ?></td>

                        <td>
                            <form action="book/DetailsBookController.php" method="POST">
                                <input type="hidden" name="isbn" value="<?= $book['isbn'] ?>">
                                <input class="btnDetail" type="submit" value="Détails">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>


<script src="../../../public/js/admin/dashboard.js"></script>
<script src="../../../public/js/admin/templates/navbar.js"></script>
</body>
</html>


