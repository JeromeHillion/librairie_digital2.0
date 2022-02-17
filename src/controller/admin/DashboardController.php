<?php


use App\repository\BookRepository\BookRepository;

ini_set('display_errors', true);

require '../../../vendor/autoload.php';

$bookRepository = new BookRepository();
$books = $bookRepository->findLast();


require '../../vue/admin/dashboard.php';