<?php

namespace App\Bdd;
use App\config\Config;
use PDO;


class Connection
{
    protected array $config;

    public function __construct()
    {
        $this->config = Config::getConfig();
    }

    public   function getConnectionToBdd(): \PDO
    {
        $config = $this->config;
        $hostname = $config['db_host'];
        $username = $config['db_user'];
        $password = $config['db_password'];
        $db = $config['db_name'];

        $pdo =  new PDO("mysql:host=".$hostname.".;dbname=".$db,$username, $password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}
