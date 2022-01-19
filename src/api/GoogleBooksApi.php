<?php

namespace App\api;

use App\config\Config;


class GoogleBooksApi
{
    protected array $config;
    protected string $api_key;
    protected string $apiUrl;

    public function __construct()
    {
        $this->config = Config::getConfig();
        $this->api_key = $this->config['api_key'];
        $this->apiUrl = "https://www.googleapis.com/books/v1/volumes?q=";
    }


    public function findByName($name)
    {

        // L'url de la requête
        $url = $this->apiUrl . urlencode($name) . "&key=" . $this->api_key;


        // On intéroge le fichier JSON
        $req = file_get_contents($url);

        //Et on le renvoie sous forme de tableau
        return $res = json_decode($req, true);

    }


    public function findByISBN(int $isbn)
    {

        //L'url de la requête
        $url = $this->apiUrl."isbn:".$isbn."&key=". $this->api_key;
        $req = file_get_contents($url);
        return $res = json_decode($req, true);
    }

}