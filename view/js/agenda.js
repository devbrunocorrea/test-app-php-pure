$(document).ready(function () {
    //tela login
    $('#btnLoginEntrar').on('click', login);

    //tela admin
    $('#btnAdminCadastrar').on('click', cadastrar);

});

var login = function () {
    console.log('botao login');
    if (validarLogin()) {
        return true;
    }

    return false;
};

var validarLogin = function () {
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if($('#loginEmail').val().trim() === ''){
        alert('O campo e-mail está vazio.');
        return false;
    }

    if (!regex.test($('#loginEmail').val().trim())) {
        alert('E-mail inválido.');
        return false;
    }

    return true;
};

var cadastrar = function(){

};