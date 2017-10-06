<?php
require_once './core/bootstrap.php';

//routes
switch (filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING)) {
    case 'login':
        $contato = new AgendaController();
        $contato->showLogin();
        break;
    case 'logout':
        $contato = new AgendaController();
        $contato->logout();
        break;
    case 'admin':
        $contato = new AgendaController();
        $contato->showLogin();
        break;
    default:
        $contato = new AgendaController();
        $contato->index();
        break;
}
