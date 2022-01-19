<?php

namespace App\repository;

use App\bdd\Connection;
use PDO;

class CrudRepository
{
    protected Connection $connection;


    public function __construct()
    {
        $this->connection = new Connection();
    }

    public function findById(string $table,int $id)
    {
        $pdo = $this->connection->getConnectionToBdd();
        $req= $pdo->prepare("SELECT * FROM `$table` WHERE id = ?");
        $req->execute([$id]);
        $res = $req->fetch();

        if (!sizeof($res))
        {
            return null;
        }
        return $res;
    }

    public function findAll(string $table)
    {
        $pdo = $this->connection->getConnectionToBdd();
        $req= $pdo->prepare("SELECT * FROM `$table` ");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (!sizeof($res))
        {
            return [];
        }
        return $res;
    }

    public function add(string $object)
    {

    }

    public function delete(string $object)
    {

    }
}