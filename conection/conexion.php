<?php
class Conexion
{
    static public function conectar()
    {
        $link = new PDO(
            "mysql:host=localhost;port=3306;dbname=cubicmusic",
            "root",
            ""
        );
        $link->exec("set names utf8");
        return $link;
    }
}