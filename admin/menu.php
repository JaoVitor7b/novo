<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <h3 class="m-5 text-light">
    <img src="../assets/imagens/logolight.png" width="50" height="50">Solstice Tech Solutions
    </h3>
    <div class="collapse navbar-collapse mx-5" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active mx-3" aria-current="page" href="index.php">Início</a>
        </li>
        <li class="nav-item dropdown mx-3">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastro
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="pgusuario.php">Usuário</a></li>
            <li><a class="dropdown-item" href="pgcard.php">Cards</a></li>
            <li><a class="dropdown-item" href="pgcategoria.php">Categoria</a></li>            
            <li><a class="dropdown-item" href="pgservico.php">Serviço</a></li>
            <li><a class="dropdown-item" href="pgcardapio.php">Cardapio</a></li>
            <li><a class="dropdown-item" href="pgproduto.php">Produto</a></li>
            <li><a class="dropdown-item" href="pgsobre.php">Sobre Nós</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown mx-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['email'];?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>