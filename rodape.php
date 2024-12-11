<?php 
include 'admin/config.php';
?>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid m-5">
    <h4 class="text-dark mx-4">
      <img src="assets/imagens/logodark.png" width="50" height="50">Solstice Tech Solutions
    </h4>
    <!-- Botão de hambúrguer para telas pequenas -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu que será ocultado em telas pequenas -->
    <div class="collapse navbar-collapse mx-4 p-0" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item mx-3">
          <a class="nav-link active text-dark" aria-current="page" href="logistica.php">Logística</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link active text-dark" aria-current="page" href="dados.php">Dados e Referências</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link active text-dark" aria-current="page" href="potifolio.php">Portfólio</a>
        </li>
      </ul>  
    </div>
  </div>
</nav>

