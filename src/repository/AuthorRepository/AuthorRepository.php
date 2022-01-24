<?php

namespace App\repository\AuthorRepository;

use App\Bdd\Connection;
use App\entity\Author;

use PDO;

class AuthorRepository extends Connection
{
    protected PDO  $connection;
    protected array $config;
    protected string $t_author;

    public function __construct()
    {
        parent::__construct();
        $this->config = parent::getConfig();
        $this->connection = parent::getConnectionToBdd();
        $this->t_author = $this->config['t_author'];
    }

    public function findById(int $id)
    {

        $req= $this->connection->prepare("SELECT * FROM `$this->t_author` WHERE id = ?");
        $req->execute([$id]);
        $res = $req->fetch();

        if (!sizeof($res))
        {
            return null;
        }
        return $res;
    }

    public function findAll(): array
    {
        $req= $this->connection->prepare("SELECT * FROM `$this->t_author` ");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!sizeof($res))
        {
            return [];
        }
        return $res;
    }

    public function findByName(string $name): array
    {
        $req= $this->connection->prepare("SELECT * FROM `$this->t_author` WHERE name = ?");
        $req->execute([$name]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!$res)
        {
            return [];
        }
        return $res;
    }

    public function add(Author $author):Author
    {
        $req = $this->connection->prepare("INSERT INTO `$this->t_author` (name) VALUES(:name)");

        $req->bindValue(':name', $author->getName());

        $res = $req->execute();



        if (!$res) {
            $req->errorInfo();
        }
        return $author;
    }

    public function delete(Author $author)
    {

    }
}