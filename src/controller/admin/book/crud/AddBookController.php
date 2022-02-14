<?php


use App\entity\Author;
use App\entity\Book;
use App\entity\Category;
use App\manager\GoogleBooksApiManager;
use App\repository\AuthorRepository\AuthorRepository;
use App\repository\BookRepository\BookRepository;
use App\repository\CategoryRepository\CategoryRepository;


ini_set('display_errors', true);

require '../../../../vendor/autoload.php';

$categoryRepository = new CategoryRepository();
$authorRepository = new AuthorRepository();
$bookRepository = new BookRepository();
$category = new Category();
$author = new Author();
$book = new Book();


$categoryExist = $categoryRepository->findByName(htmlspecialchars($_POST['category']));

$category->setName(htmlspecialchars($_POST['category']));
if (!$categoryExist) {
    $categoryRepository->add($category);

} else {
    echo "La catégorie " . $category->getName() . " existe déjà !";
}

$categoryExist = $categoryRepository->findByName(htmlspecialchars($_POST['category']));
foreach ($categoryExist as $categoryId) {
    $book->setCategoryId($categoryId['id']);
}


$authorExist = $authorRepository->findByName((htmlspecialchars($_POST['author'])));

$author->setName((htmlspecialchars($_POST['author'])));
if (!$authorExist) {
    $authorRepository->add($author);

} else {
    echo "L'auteur'" . $author->getName() . " existe déjà !";

}

$authorExist = $authorRepository->findByName((htmlspecialchars($_POST['author'])));
foreach ($authorExist as $authorId) {
    $book->setAuthorId($authorId['id']);
}

$book->setIsbn(htmlspecialchars($_POST['isbn']));
$book->setName(htmlspecialchars($_POST['name']));
$book->setPublication(htmlspecialchars($_POST['publication']));
$book->setCover(htmlspecialchars($_POST['cover']));
$book->setSummary(htmlspecialchars($_POST['summary']));

$bookExist = $bookRepository->findByIsbn($book->getIsbn());

if (!$bookExist) {
    echo "Le livre n'existe pas !";
    $bookRepository->add($book);
    header("Location: ../BookController.php");
}
header("Location: ../BookController.php");

require '../../../vue/admin/book/crud/addBook.php';