<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../public/css/normalize.css">
    <link rel="stylesheet" href="../../../public/css/admin/templates/navbar.css">
    <link rel="stylesheet" href="../../../public/css/admin/templates/menu.css">
    <link rel="stylesheet" href="../../../public/css/admin/dashboard.css">

    <title>Document</title>
</head>
<body>


<div class="containerGeneral">
    <?php
    include_once 'templates/navbar.php';
    ?>
    <div class="container">
        <div class="row">
            <?php
            include_once 'templates/menu.php';
            ?>
        </div>
        <div class="row">
            <div class="date">

            </div>

            <div class="lastBook">
                <h2>Derniers livres ajoutés</h2>
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
                        <td><?= $book['category']; ?></td>
                        <td><?= $book['author']; ?></td>

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
            </div>
        </div>
    </div>


</div>
<script src="../../../public/js/admin/dashboard.js"></script>
</body>
</html>


