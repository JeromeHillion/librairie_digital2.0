<?php

namespace App\repository\BookRepository;

use App\Bdd\Connection;
use App\entity\Book;
use PDO;
use App\config\Config;

class BookRepository extends Connection
{

    protected array $config;
    protected PDO $connection;
    protected string $t_book;

    public function __construct()
    {
        parent::__construct();
        $this->config = parent::getConfig();
        $this->connection = parent::getConnectionToBdd();
        $this->t_book = $this->config['t_book'];

    }

    public function findByIsbn(int $isbn)
    {
        $req= $this->connection->prepare("SELECT * FROM `$this->t_book` WHERE isbn = ?");
        $req->execute([$isbn]);
        $res = $req->fetch();

        if (empty($res))
        {
            return [];
        }
        return $res;
    }

    public function findAll()
    {

        $req = $this->connection->prepare("SELECT book.id, book.isbn, book.name, category.name AS category, author.name AS author , book.cover, book.publication, book.summary FROM `$this->t_book` LEFT JOIN category ON category.id = book.category_id
        LEFT JOIN author ON author.id = book.author_id;");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!sizeof($res))
        {
            return [];
        }
        return $res;
    }

    public function findLast()
    {

        $req = $this->connection->prepare("SELECT book.id, book.isbn, book.name, category.name AS category, author.name AS author , book.cover, book.publication, book.summary FROM `$this->t_book` LEFT JOIN category ON category.id = book.category_id
        LEFT JOIN author ON author.id = book.author_id LIMIT 10;");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!sizeof($res))
        {
            return [];
        }
        return $res;
    }

    public function findByName(string $table, string $name): array
    {
        // TODO: Implement findByName() method.
    }

    public function add($book) :Book

    {

        $req =$this->connection->prepare("INSERT INTO `$this->t_book` (isbn,cover,name,publication,summary,category_id,author_id) VALUES(:isbn,:cover,:name,:publication,:summary,:category_id,:author_id)");
        $req->bindValue("isbn",$book->getIsbn());
        $req->bindValue("cover",$book->getCover());
        $req->bindValue("name",ucfirst($book->getName()));
        $req->bindValue("publication",$book->getPublication());
        $req->bindValue("summary",ucfirst($book->getSummary()));
        $req->bindValue("category_id",$book->getCategoryId());
        $req->bindValue("author_id",$book->getAuthorId());
        $res = $req->execute();

        if (!$res) {
            $req->errorInfo();
        }
        return $book;
    }

    public function delete(string $table, object $object)
    {
        // TODO: Implement delete() method.
    }


    /*public function findAll($table)
    {
        $pdo = $this->connection->getConnectionToBdd();
        $req = $pdo->prepare("SELECT book.id, book.isbn, book.name, category.name AS category, author.name AS author , book.cover, book.publication, book.summary FROM `$table` LEFT JOIN category ON category.id = book.category_id
        LEFT JOIN author ON author.id = book.author_id;");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!sizeof($res))
        {
            return [];
        }
        return $res;
    }

    /* public function save($book)

     {

             $pdo = $this->connection->getConnectionToBdd();

             $req = $pdo->prepare("INSERT INTO `book` (isbn,cover,name,publication,summary,category_id,author_id) VALUES(:isbn,:cover,:name,:publication,:summary,:category_id,:author_id)");
             $req->bindValue("isbn",$book->getIsbn());
             $req->bindValue("cover",$book->getCover());
             $req->bindValue("name",ucfirst($book->getName()));
             $req->bindValue("publication",$book->getPublication()->format('Y-m-d'));
             $req->bindValue("summary",ucfirst($book->getSummary()));
             $req->bindValue("category_id",$book->getCategoryId());
             $req->bindValue("author_id",$book->getAuthorId());
             $res = $req->execute();

             if (!$res) {
                $req->errorInfo();
             }
     }

     public function findByName(string $name)
     {
         $pdo = $this->connection->getConnectionToBdd();

         $req = $pdo->prepare("SELECT * FROM `book` WHERE name = ?");
         $req->execute([$name]);
         $res = $req->fetch(PDO::FETCH_ASSOC);


         return $res;
     }

     public function findCategoryByid(int $id)
     {
         $pdo = $this->connection->getConnectionToBdd();

         $req = $pdo->prepare("SELECT * FROM `category` WHERE name = ?");
         $req->execute([$id]);
         $res = $req->fetch();

         return $res;
     }

     public function findAuthoryByid(int $id)
     {
         $pdo = $this->connection->getConnectionToBdd();

         $req = $pdo->prepare("SELECT * INTO `author` WHERE name = ?");
         $req->execute([$id]);
         $res = $req->fetch();

         return $res;
     }*/
}
