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


$category->setName(htmlspecialchars($_POST['category']));
$categoryExist = $categoryRepository->findByName($category->getName());


if (!$categoryExist) {
    $categoryRepository->add($category);
    $book->setCategoryId($category['id']);

} else {
    echo "La catégorie " . $category->getName() . " existe déjà !";
    $arrCategory = $categoryRepository->findByName($category->getName());
    foreach ($arrCategory as $categoryId) {
        $book->setCategoryId($categoryId['id']);

    }
}
$author->setName(htmlspecialchars($_POST['author']));
$authorExist = $authorRepository->findByName($author->getName());


if (!$authorExist) {
    $authorRepository->add($author);
    $book->setAuthorId($author['id']);

} else {
    echo "L'auteur'" . $category->getName() . " existe déjà !";
    $arrAuthor = $authorRepository->findByName($author->getName());
    foreach ($arrAuthor as $authorId) {
        $book->setAuthorId($authorId['id']);

    }
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
}


require '../../../vue/admin/book/crud/addBook.php';