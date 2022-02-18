<?php

use App\manager\GoogleBooksApiManager;
use App\repository\BookRepository\BookRepository;

ini_set('display_errors', true);

require '../../../vendor/autoload.php';

$googleBooksApiManager = new  GoogleBooksApiManager();
$bookRepository = new BookRepository();
/*var_dump($googleBooksApiManager->getBookByIsbn($_POST['isbn']));
die;*/
$exist =$bookRepository->findByIsbn($_POST['isbn']);
if (!$exist){
    $book = $googleBooksApiManager->getBookByIsbn($_POST['isbn']);

}

else {

    $book = "";
}


require '../../vue/admin/book/crud/addBookForm.php';