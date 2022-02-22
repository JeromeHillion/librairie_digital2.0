<?php

use App\Exception\NullException;
use App\manager\GoogleBooksApiManager;
use App\repository\BookRepository\BookRepository;

ini_set('display_errors', true);

require '../../../vendor/autoload.php';

$googleBooksApiManager = new  GoogleBooksApiManager();
$bookRepository = new BookRepository();
if (empty($_POST['isbn'])) {
    throw new NullException();

}
$exist = $bookRepository->findByIsbn($_POST['isbn']);
if (!$exist) {
    $book = $googleBooksApiManager->getBookByIsbn($_POST['isbn']);

}

require '../../vue/admin/book/crud/addBookForm.php';