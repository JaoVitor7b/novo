<div style="float: left;">
<div id="carouselExampleControls" class="carousel slide mx-4" data-bs-ride="carousel" data-bs-interval="2500">
      <div class="carousel-inner">
<?php 
        $card = $pdo->query("SELECT * FROM cards");
        $activeClass = 'active';
        $count = 0; 
        echo '<div class="carousel-item ' . $activeClass . '"><div class="row justify-content-center">';
        while($linha = $card->fetch(PDO::FETCH_ASSOC)){
          if ($count > 0 && $count % 2 == 0) {  
            echo '</div></div><div class="carousel-item"><div class="row justify-content-center">';
          }
        ?> 
    <div class="card m-3 bg-roxo text-light" style="width: 18rem;">
  <div class="card-body justify-content-center">
    <h5 class="card-title"><?php echo $linha['nome'];?></h5>
    <p class="card-text"><?php echo $linha['descricao'];?></p>
  </div>
</div>
   <?php 
        $count++;
        } 
        echo '</div></div>';
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Voltar</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
        <span class="visually-hidden">Avançar</span>
      </button>
  </div>
</div>