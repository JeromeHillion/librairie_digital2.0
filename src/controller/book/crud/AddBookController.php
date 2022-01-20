<?php


use App\entity\Author;
use App\entity\Category;
use App\manager\GoogleBooksApiManager;
use App\repository\CrudRepository;

ini_set('display_errors', true);

require '../../../../vendor/autoload.php';

$isbn = htmlspecialchars($_POST['isbn']);
$name = htmlspecialchars($_POST['name']);
$publication = htmlspecialchars($_POST['publication']);
$cover = htmlspecialchars($_POST['cover']);
$summary= htmlspecialchars($_POST['summary']);
$category = htmlspecialchars($_POST['category']);
$author = htmlspecialchars($_POST['author']);

$crudRepository = new CrudRepository();
$category = new Category();
$author = new Author();

$category->setName(htmlspecialchars($_POST['category']));
$categoryExist =$crudRepository->findByName('category', $category->getName());

$author->setName(htmlspecialchars($_POST['author']));
$authorExist =$crudRepository->findByName('author', $author->getName());

if (!$categoryExist)
{
    $crudRepository->add('category',$category->getName());

}

else
{
    echo "La catégorie ".$category->getName()." existe déjà !";
}

if (!$authorExist)
{
    $crudRepository->add('author',$author->getName());
    echo "L'auteur a bien été ajouté !";

}

else
{
    echo "L'auteur' ".$author->getName()." existe déjà !";
}


require '../../../vue/admin/book/crud/addBook.php';