<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto justify-content-end ">
            <a class="nav-item nav-link" href="index.php">Contatos</a>
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === 1): ?>
                <a class="nav-item nav-link" href="index.php?action=logout">Logout</a>
            <?php else: ?>
                <a class="nav-item nav-link" href="index.php?action=login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>