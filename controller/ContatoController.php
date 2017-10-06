<?php

class ContatoController {

    private $contatoDAO;

    public function __construct() {
        $this->contatoDAO = new ContatoDAO();
    }

    public function showHome() {
        $output = array();
        $output['listaContatos'] = $this->getListaContatos();
        View::showView('index', $output);
    }

    private function getContatoPorId($id) {
        if (!($id > 0)) {
            return null;
        }

        $contato = $this->contatoDAO->get($id);

        return $contato;
    }

    private function getListaContatos() {
        $listaContatos = $this->contatoDAO->getAll();
        $novaListaContatos = array();
        foreach ($listaContatos as $key => $contato) {
            $novaListaContatos[$key]['id'] = $contato->getId();
            $novaListaContatos[$key]['nome'] = $contato->getNome();
            $novaListaContatos[$key]['telefone'] = $contato->getTelefone();
        }

        return $novaListaContatos;
    }

    public function get() {
        $id = filter_has_var(INPUT_GET, 'id') ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : false;

        if ($id) {
            exit(json_encode(array(
                'contato' => $this->getContatoPorId($id)
            )));
        }

        exit(json_encode($this->getListaContatos()));
    }

    public function post() {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

        $contato = new Contato();
        $contato->setNome($nome);
        $contato->setTelefone($telefone);
        $id = $this->contatoDAO->insert($contato);

        if ($id > 0) {
            http_response_code(201);
            exit(json_encode(array(
                'code' => 201,
                'id' => $id,
            )));
        }
    }

    private function getParametros() {
        $conteudo = file_get_contents('php://input');

        $lista = explode('&', $conteudo);

        $parametros = array();
        foreach ($lista as $item) {
            $parametros[stristr($item, '=', true)] = ltrim(stristr($item, '='), '=');
        }

        return $parametros;
    }

    public function put() {
        $_PUT = $this->getParametros();

        $nome = filter_var($_PUT['nome'], FILTER_SANITIZE_STRING);
        $telefone = filter_var($_PUT['telefone'], FILTER_SANITIZE_NUMBER_INT);
        $id = filter_var($_PUT['id'], FILTER_SANITIZE_NUMBER_INT);

        $contato = new Contato();
        $contato->setId($id);
        $contato->setNome($nome);
        $contato->setTelefone($telefone);

        if ($this->contatoDAO->update($contato)) {
            http_response_code(202);
            exit(json_encode(array(
                'code' => 202,
                'id' => $id,
            )));
        }
    }

    public function delete() {
        $_DELETE = $this->getParametros();

        $id = filter_var($_DELETE['id'], FILTER_SANITIZE_NUMBER_INT);

        $contato = new Contato();
        $contato->setId($id);

        if ($this->contatoDAO->delete($contato)) {
            http_response_code(204);
            exit(json_encode(array(
                'code' => 204,
                'id' => $id,
            )));
        }

        http_response_code(500);
        exit(json_encode(array(
            'code' => 500,
            'id' => $id,
        )));

    }

}