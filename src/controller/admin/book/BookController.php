<?php


use App\manager\GoogleBooksApiManager;

ini_set('display_errors', true);

require '../../../../vendor/autoload.php';

if ($_POST) {
    $googleBookApiManager = new GoogleBooksApiManager();
    $books = $googleBookApiManager->getListInfos(htmlspecialchars($_POST['name']));
} else {
    $books = [];
}

require '../../../vue/admin/book/book.php';
