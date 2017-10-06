<?php
require_once './core/bootstrap.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new ContatoController();

switch($method){
    case 'GET':
        $controller->get();
        break;
    case 'POST':
        $controller->post();
        break;
    case 'PUT':
        $controller->put();
        break;
    case 'DELETE':
        $controller->delete();
        break;
}