<?php


use App\repository\BookRepository\BookRepository;

ini_set('display_errors', true);

require '../../../vendor/autoload.php';

$bookRepository = new BookRepository();
$books = $bookRepository->findLast();

/*foreach ($books as $book)
{
    echo $book['isbn']."<br />";
    echo $book['name']."<br />";
    echo $book['publication']."<br />";
    echo $book['author']."<br />";
    echo $book['category']."<br />";

    echo "<br />";
}*/

require '../../vue/admin/dashboard.php';