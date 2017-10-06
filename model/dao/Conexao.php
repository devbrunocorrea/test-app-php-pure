<?php

class Conexao {
    public static function getConexao() {
        $pdo = new PDO('mysql:host=localhost;dbname=agenda', 'root', '', array(PDO::ATTR_PERSISTENT => true));
        return $pdo;
    }

}