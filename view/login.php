<?php include 'header.php'; ?>
<script>
    var mensagemErro = '<?=isset($erro) ? $erro : '';?>';
    if (mensagemErro !== '') {
        alert(mensagemErro);
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>Gerenciar Agenda</h1>
            <form action="index.php?action=login" method="post">
                <div class="form-group row">
                    <label for="loginEmail" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail"placeholder="Digite seu e-mail" value="<?=isset($email)?$email:'';?>" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="loginSenha" class="col-sm-2 col-form-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="loginSenha" name="loginSenha" placeholder="Senha" required>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary center" id="btnLoginEntrar" name="btnLoginEntrar">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<?php include 'footer.php'; ?>

