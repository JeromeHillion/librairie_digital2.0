<?php
namespace App\config;

class Config
{

    public static function  getConfig()
    {
        return parse_ini_file('config.ini');
    }
}