<?php include 'config.php';?><?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
        exit();
    }
?>

<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Site</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>

    <div class="container mt-3">
<!-- Botao Modal Cadastro Inicio -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar Pacote de serviços
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Pacote de serviços</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="opservico.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Digite o nome do Pacote de serviços" name="txt_servico" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="text" class="form-control" placeholder="Digite o preço do Pacote de serviços" name="txt_preco" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea type="text" class="form-control" placeholder="Descrição" name="txt_descricao" rows="6" required></textarea>
                    </div>      
                    <div class="mb-3">
                    <label class="form-label">Selecione a categoria de Pacote de serviços</label>
                    <select class="form-select" name="txt_categoria">
                    <?php 
                        $sql = $pdo->query("SELECT * FROM categorias ORDER BY categoria");

                        while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <option value="<?php echo $linha['idcategoria'];?>"><?php echo $linha['categoria'];?></option>
                    <?php } ?>
                    </select>    
                    </div>

                    <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input class="form-control" type="file" name="file_foto" required>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>   
        <!-- Listagem início -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Pacote de serviço</th>
                <th scope="col">Categoria</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $pdo->query("SELECT s.idservico, s.nome, s.preco, s.descricao, s.foto, c.categoria, c.idcategoria 
                FROM servicos s INNER JOIN categorias c
                ON s.idcategoria = c.idcategoria");

                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                <th scope="row"><?php echo $linha['idservico'];?></th>
                <td><?php echo $linha['nome'];?></td>
                <td><?php echo $linha['categoria'];?></td>
                <td><?php echo $linha['preco'];?></td>
                <td><?php echo $linha['descricao'];?></td>
                <td><img src="imagens/<?php echo $linha['foto'];?>" width="100px"></td>
                <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $linha['idservico'];?>">Editar</button>    
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalExcluir<?php echo $linha['idservico'];?>">Excluir</button>
                </td>
                </tr>
<!-- Modal excluir inicio -->
                <div class="modal fade" id="ModalExcluir<?php echo $linha['idservico'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir o Pacote de serviço?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto">
                        <a href="opservico.php?acao=excluir&id=<?php echo $linha['idservico'];?>&foto=<?php echo $linha['foto'];?>" class="btn btn-danger">Sim</a>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Modal excluir fim -->
                <!-- Modal Editar inicio -->
                <div class="modal fade" id="ModalEditar<?php echo $linha['idservico'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edição do Pacote de servico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="opservico.php?acao=editar&id=<?php echo $linha['idservico'];?>&foto=<?php echo $linha['foto'];?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label class="form-label">Serviço</label>
                            <input type="text" class="form-control" value="<?php echo $linha['nome'];?>" name="txt_servico" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Preço</label>
                            <input type="text" class="form-control" value="<?php echo $linha['preco'];?>" name="txt_preco" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Descricao</label>
                            <textarea type="text" class="form-control" placeholder="Descrição" name="txt_descricao" rows="6" required></textarea>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Selecione a Categoria de pacote</label>
                            <select class="form-select" name="txt_categoria">
                            <?php 
                                $sql = $pdo->query("SELECT * FROM categorias ORDER BY categoria");

                                while($linhac = $sql->fetch(PDO::FETCH_ASSOC)){
                                if($linha['idcategoria'] == $linhac['idcategoria']){    
                            ?>
                            <option value="<?php echo $linhac['idcategoria'];?>" selected><?php echo $linhac['categoria'];?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $linhac['idcategoria'];?>"><?php echo $linhac['categoria'];?></option>
                          <?php  } 
                        }?>
                            </select>    
                            </div>

                            <div class="mb-3">
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control" type="file" name="file_foto">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>   
                <!-- Modal Editar fim -->
                <?php } ?>
            </tbody>
        </table>
        <!-- listagem fim -->
    </div>
    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>