<?php

class AgendaController {

    private $contatoDAO;
    private $adminDAO;

    public function __construct() {
        $this->contatoDAO = new ContatoDAO();
        $this->adminDAO = new AdminDAO();
    }

    public function index() {
        $output = array();
        $output['listaContatos'] = $this->contatoDAO->getAll();
        View::showView('index', $output);
    }

    public function showLogin() {
        if (filter_has_var(INPUT_POST, 'loginEmail')) {
            $this->login();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === 1) {
            View::showView('admin');

            return;
        }

        View::showView('login');
    }

    private function login() {
        $output = array();
        $email = filter_input(INPUT_POST, 'loginEmail', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'loginSenha', FILTER_SANITIZE_STRING);

        if(!$email){
            $output['erro'] = 'E-mail inválido.';
        }

        if ($email && $senha) {
            $login = $this->adminDAO->login($email, $senha);

            if (isset($login->email) && isset($login->senha)) {
                $output['email'] = $login->email;
                if ($login->email == $email && $login->senha == $senha) {
                    $this->iniciarSessao();
                    View::showView('admin', $output);

                    return;
                } else {
                    $output['erro'] = 'Usuário sem permissão de acesso';
                }
            } else {
                $output['erro'] = 'Falha na comunicação com a base de dados';
            }
        }

        View::showView('login',$output);
    }

    private function iniciarSessao() {
        session_start();
        $_SESSION['logado'] = 1;
    }

    public function logout(){
        session_start();
        session_destroy();
        return $this->index();
    }
}