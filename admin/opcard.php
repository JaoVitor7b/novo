<?php
include 'config.php';

if(!empty($_POST['txt_nome'])){
    $nome = $_POST['txt_nome'];
    $descricao = $_POST['txt_descricao'];  
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
        $insert = $pdo->prepare("INSERT INTO cards (nome, descricao) VALUES (?, ?)");
        $insert->bindValue(1, $nome);
        $insert->bindValue(2, $descricao);
        $insert->execute();
        header("Location:pgcard.php");
    }


if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id= $_GET['id'];

    $del = $pdo->prepare("DELETE FROM cards WHERE idcard = ?");
    $del->bindValue(1, $id);
    $del->execute();
    header('Location:pgcard.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];

        $edit = $pdo->prepare("UPDATE cards SET nome = ?, descricao = ? WHERE idcard = ?");
        $edit->bindValue(1, $nome);
        $edit->bindValue(2, $descricao);
        $edit->bindValue(3, $id);
        $edit->execute();
        header("Location:pgcard.php");
    }else{


        $edit = $pdo->prepare("UPDATE cards SET nome = ?, descricao = ? WHERE idcard = ?");
        $edit->bindValue(1, $nome);
        $edit->bindValue(2, $descricao);
        $edit->bindValue(3, $id);
        $edit->execute();
        header("Location:pgcard.php");
        }