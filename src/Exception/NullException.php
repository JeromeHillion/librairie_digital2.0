<?php

namespace App\Exception;

class NullException extends \Exception
{
    protected $message = "Pour accéder à cette page il faut dabord faire une recherche, aucunes informations ne peut être utilisées par le navigateur";
}