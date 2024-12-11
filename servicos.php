<div class="espelho m-5">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="15000">
        <div class="carousel-inner">

            <?php 
            $card = $pdo->query("SELECT * FROM categorias");
            $activeClass = 'active';
            $count = 0; 
            echo '<div class="carousel-item ' . $activeClass . '"><div class="row d-flex justify-content-center align-items-center">';
            while($linha = $card->fetch(PDO::FETCH_ASSOC)) {
                if ($count > 0 && $count % 2 == 0) {  
                    echo '</div></div><div class="carousel-item"><div class="row d-flex justify-content-center align-items-center">';
                }
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-10 d-flex justify-content-center mb-4">
                <div class="postcard p-3 shadow h-100 border rounded text-center">
                    <img src="admin/imagens/<?php echo $linha['foto']; ?>" class="d-block w-100 rounded" alt="Foto de <?php echo $linha['categoria']; ?>">
                    <b class="text-center">
                        <button type="button" class="btn btn-dark py-2 px-3 mt-3 mb-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalCard<?php echo $linha['idcategoria']; ?>">
                            <?php echo htmlspecialchars($linha['categoria']); ?>
                        </button>
                    </b>
                </div>
            </div>

            <!-- Modal de exibição dos categorias -->
            <div class="modal fade" id="modalCard<?php echo $linha['idcategoria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-dark">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $linha['categoria']; ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table imgservico">
                                <tbody>
                                    <?php
                                    $sql = $pdo->prepare("SELECT * FROM servicos WHERE idcategoria=?");
                                    $sql->bindValue(1, $linha['idcategoria']);
                                    $sql->execute();
                                    while($listservico = $sql->fetch(PDO::FETCH_ASSOC)) {
                                        $categoriaservico = $listservico['nome'];
                                        $precoservico = $listservico['preco'];
                                        $descricaoservico = $listservico['descricao'];
                                    ?>
                                    <tr>
                                        <td><img src="admin/imagens/<?php echo $listservico['foto']; ?>" alt="<?php echo $categoriaservico; ?>" class="img-fluid rounded"></td>
                                        <td>
                                            <h3><?php echo $categoriaservico; ?></h3>
                                            <div class="p-2">
                                                <p>Preço: <?php echo $precoservico; ?></p>
                                                <p><?php echo $descricaoservico; ?></p>
                                            </div>  
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $count++;
            } 
            echo '</div></div>';
            ?>
        </div>

        <!-- Botões de controle -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Voltar</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Avançar</span>
        </button>
    </div>
</div>