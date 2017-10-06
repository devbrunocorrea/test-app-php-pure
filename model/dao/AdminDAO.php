<?php

class AdminDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function login($email, $senha) {
        $sql = "SELECT email, senha FROM admin WHERE email = :email and senha = :senha";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchObject();
    }
}