<?php

use App\manager\GoogleBooksApiManager;

ini_set('display_errors', true);

require '../../../vendor/autoload.php';

$googleBooksApiManager = new  GoogleBooksApiManager();
var_dump($googleBooksApiManager->getBookByIsbn($_POST['isbn']));
$book = $googleBooksApiManager->getBookByIsbn($_POST['isbn']);

require '../../vue/admin/book/detailsBook.php';