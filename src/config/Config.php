<?php
namespace App\config;

class Config
{


    public static function  getConfig():array
    {
        return parse_ini_file('config.ini');

    }
}