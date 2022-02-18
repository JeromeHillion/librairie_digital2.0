<?php


use App\repository\BookRepository\BookRepository;

ini_set('display_errors', true);

require '../../../vendor/autoload.php';

$bookRepository = new BookRepository();
$books = $bookRepository->findAll();
/*var_dump($books);
die;*/

require '../../vue/admin/book/Catalog.php';
