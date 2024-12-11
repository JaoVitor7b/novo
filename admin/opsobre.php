<?php
include 'config.php';

try {
    // Verifica se a ação é de cadastrar
    if (isset($_GET['acao']) && $_GET['acao'] === "cadastrar" && !empty($_POST['txt_nome'])) {
        $nome = trim($_POST['txt_nome']);
        $descricao1 = trim($_POST['txt_descricao1']);
        $descricao2 = trim($_POST['txt_descricao2']);
        $descricao3 = trim($_POST['txt_descricao3']);
        $localizacao = trim($_POST['txt_localizacao']);
        $telefone = trim($_POST['txt_telefone']);

        // Valida campos obrigatórios
        if (empty($nome) || empty($descricao1) || empty($descricao2) || empty($descricao3) || empty($localizacao) || empty($telefone)) {
            throw new Exception("Todos os campos são obrigatórios.");
        }

        // Insere dados no banco
        $insert = $pdo->prepare("
            INSERT INTO sobre (nome, descricao1, descricao2, descricao3, localizacao, telefone) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $insert->bindValue(1, $nome);
        $insert->bindValue(2, $descricao1);
        $insert->bindValue(3, $descricao2);
        $insert->bindValue(4, $descricao3);
        $insert->bindValue(5, $localizacao);
        $insert->bindValue(6, $telefone);
        $insert->execute();

        // Redireciona após o cadastro
        header("Location: pgsobre.php", true, 302);
        exit();
    }

    // Verifica se a ação é de editar
    if (isset($_GET['acao']) && $_GET['acao'] === "editar" && !empty($_POST['txt_nome'])) {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $nome = trim($_POST['txt_nome']);
        $descricao1 = trim($_POST['txt_descricao1']);
        $descricao2 = trim($_POST['txt_descricao2']);
        $descricao3 = trim($_POST['txt_descricao3']);
        $localizacao = trim($_POST['txt_localizacao']);
        $telefone = trim($_POST['txt_telefone']);

        // Valida campos obrigatórios
        if (empty($id) || empty($nome) || empty($descricao1) || empty($descricao2) || empty($descricao3) || empty($localizacao) || empty($telefone)) {
            throw new Exception("Todos os campos são obrigatórios e o ID deve ser válido.");
        }

        // Atualiza dados no banco
        $up = $pdo->prepare("
            UPDATE sobre 
            SET nome = ?, descricao1 = ?, descricao2 = ?, descricao3 = ?, localizacao = ?, telefone = ? 
            WHERE idsobre = ?
        ");
        $up->bindValue(1, $nome);
        $up->bindValue(2, $descricao1);
        $up->bindValue(3, $descricao2);
        $up->bindValue(4, $descricao3);
        $up->bindValue(5, $localizacao);
        $up->bindValue(6, $telefone);
        $up->bindValue(7, $id);
        $up->execute();

        // Redireciona após a edição
        header("Location: pgsobre.php", true, 302);
        exit();
    }
} catch (Exception $e) {
    // Log do erro para depuração
    error_log($e->getMessage());

    // Exibe uma mensagem amigável ao usuário
    echo "Ocorreu um erro ao processar a solicitação. Por favor, tente novamente.";
}
