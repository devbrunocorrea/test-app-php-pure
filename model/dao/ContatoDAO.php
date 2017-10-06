<?php

class ContatoDAO {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function get($id) {
        $sql = "SELECT * FROM contato WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject('Contato');
    }

    public function getAll() {
        $sql = "SELECT id, nome, telefone FROM contato";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $id, PDO::PARAM_INT);
        $stmt->execute();
        $listaContatos = array();

        while ($contato = $stmt->fetchObject('Contato')) {
            $listaContatos[] = $contato;
        }

        return $listaContatos;
    }

    public function insert(Contato $contato) {
        $sql = "INSERT INTO contato (nome,telefone) VALUES (:nome,:telefone)";
        $stmt = $this->conexao->prepare($sql);

        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();

        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);

        return $stmt->execute() ? $this->conexao->lastInsertId() : false;
    }


    public function update(Contato $contato) {
        $sql = "UPDATE contato SET nome = :nome, telefone = :telefone where id = :id";
        $stmt = $this->conexao->prepare($sql);

        $id = $contato->getId();
        $nome = $contato->getNome();
        $telefone = $contato->getTelefone();

        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete(Contato $contato) {
        $sql = "DELETE FROM contato where id = :id";
        $stmt = $this->conexao->prepare($sql);
        $id = $contato->getId();

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->execute();
    }
}