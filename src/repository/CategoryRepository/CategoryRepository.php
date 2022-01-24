<?php

namespace App\repository\CategoryRepository;

use App\bdd\Connection;
use App\entity\Category;
use PDO;

class CategoryRepository extends Connection
{
    protected PDO  $connection;
    protected array $config;
    protected string $t_category;


    public function __construct()
    {
        parent::__construct();
        $this->config = parent::getConfig();
        $this->connection = parent::getConnectionToBdd();
        $this->t_category = $this->config['t_category'];
    }


    public function findById(int $id)
    {
        $req= $this->connection->prepare("SELECT * FROM `$this->t_category` WHERE id = ?");
        $req->execute([$id]);
        $res = $req->fetch();

        if (!sizeof($res))
        {
            return null;
        }
        return $res;
    }

    public function findAll()
    {
        $req= $this->connection->prepare("SELECT * FROM `$this->t_category` ");
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
        $req= $this->connection->prepare("SELECT * FROM `$this->t_category` WHERE name = ?");
        $req->execute([$name]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!$res)
        {
            return [];
        }
        return $res;
    }

    public function add(Category $category):Category
    {

        $req = $this->connection->prepare("INSERT INTO `$this->t_category` (name) VALUES(:name)");
        $req->bindValue(':name', $category->getName());
        $res = $req->execute();

        if (!$res) {
            $req->errorInfo();
        }

        return $category;
    }

    public function delete(Category $category):Category
    {

    }
}