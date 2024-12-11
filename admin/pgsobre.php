<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        // Redireciona para login se o usuário não estiver autenticado
        header("Location: login.php");
        exit();
    }

    include 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solstice Tech Solutions</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="website icon" type="png" href="assets/imagens/logolight.png">
</head>
<body>
    <?php include 'menu.php'; ?>

    <div class="container m-3">
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cadastrar informações da Empresa
        </button>

        <!-- Modal Cadastro -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro da Empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="opsobre.php?acao=cadastrar" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nome da Empresa</label>
                                <input type="text" class="form-control" name="txt_nome" placeholder="Digite o nome" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefone da Empresa</label>
                                <input type="text" class="form-control" name="txt_telefone" placeholder="Digite o telefone" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Localização da Empresa</label>
                                <input type="text" class="form-control" name="txt_localizacao" placeholder="Digite a localização" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">História da Empresa</label>
                                <textarea class="form-control" name="txt_descricao1" rows="3" placeholder="Digite a história" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição de Missão</label>
                                <textarea class="form-control" name="txt_descricao2" rows="3" placeholder="Digite a missão" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição de Visão</label>
                                <textarea class="form-control" name="txt_descricao3" rows="3" placeholder="Digite a visão" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-dark">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal">
            Editar informações da Empresa
        </button>

        <!-- Modal Edição -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar informações da Empresa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="opsobre.php?acao=editar" method="post">
                            <?php
                                $stmt = $pdo->query("SELECT * FROM sobre LIMIT 1");
                                $linha = $stmt->fetch(PDO::FETCH_ASSOC);

                                if ($linha):
                            ?>
                            <div class="mb-3">
                                <label class="form-label">Nome da Empresa</label>
                                <input type="text" class="form-control" name="txt_nome" value="<?= htmlspecialchars($linha['nome']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Localização da Empresa</label>
                                <input type="text" class="form-control" name="txt_localizacao" value="<?= htmlspecialchars($linha['localizacao']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefone da Empresa</label>
                                <input type="text" class="form-control" name="txt_telefone" value="<?= htmlspecialchars($linha['telefone']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição de Missão</label>
                                <textarea class="form-control" name="txt_descricao1" rows="3" required><?= htmlspecialchars($linha['descricao1']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição de Visão</label>
                                <textarea class="form-control" name="txt_descricao2" rows="3" required><?= htmlspecialchars($linha['descricao2']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição de Visão</label>
                                <textarea class="form-control" name="txt_descricao3" rows="3" required><?= htmlspecialchars($linha['descricao3']); ?></textarea>
                            </div>
                            <?php else: ?>
                                <p class="text-danger">Nenhuma informação encontrada para edição.</p>
                            <?php endif; ?>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>
