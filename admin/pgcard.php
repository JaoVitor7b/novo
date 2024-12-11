<?php
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
    <title>Solstice Tech Solutions</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <?php include 'menu.php';?>

    <div class="container mt-3">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Adicionar Item
        </button>

<!-- Modal Cadastro-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro do card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="opcard.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" placeholder="Digite o título" name="txt_nome" required>
                    </div> 
                    <label class="form-label">Texto</label>
                    <textarea type="text" class="form-control" placeholder="Digite seu texto" name="txt_descricao" rows="6" required></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Cadastrar</button>
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
                <th scope="col">Titulo</th>
                <th scope="col">Texto</th>
                <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $pdo->query("SELECT * FROM cards");

                while($linha = $lista->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                <th scope="row"><?php echo $linha['idcard'];?></th>
                <td><?php echo $linha['nome'];?></td>
                <td><?php echo $linha['descricao'];?></td>
                <td>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalEditar<?php echo $linha['idcard'];?>">Editar</button>    
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalExcluir<?php echo $linha['idcard'];?>">Excluir</button>
                </td>
                </tr>
                <!-- Modal excluir inicio -->
                <div class="modal fade" id="ModalExcluir<?php echo $linha['idcard'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deseja excluir?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-auto">
                        <a href="opcard.php?acao=excluir&id=<?php echo $linha['idcard'];?>" class="btn btn-secondary">Sim</a>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Não</button>
                    </div>
                    </div>
                </div>
                </div>
<!-- Modal excluir fim -->
<!-- Modal Editar inicio -->
                <div class="modal fade" id="ModalEditar<?php echo $linha['idcard'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edição do card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="opcard.php?acao=editar&id=<?php echo $linha['idcard'];?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                            <label class="form-label">Card de Exibição</label>
                            <input type="text" class="form-control" value="<?php echo $linha['nome'];?>" name="txt_nome" required>
                            </div>
                            <div class="mb-3">
                            <label class="form-label">Texto</label>
                            <textarea type="text" class="form-control" placeholder="Digite seu texto" name="txt_descricao" rows="6" required></textarea>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-dark">Salvar</button>
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