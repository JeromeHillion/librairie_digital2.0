<?php

use App\Exception\RestrictedException;
use App\manager\GoogleBooksApiManager;

ini_set('display_errors', true);

require '../../../../vendor/autoload.php';

$googleBooksApiManager = new  GoogleBooksApiManager();

if (empty($_POST['isbn'])){
    throw new RestrictedException();
}
else{

    $book = $googleBooksApiManager->getBookByIsbn($_POST['isbn']);
}

require '../../../vue/admin/book/detailsBook.php';