<?php
include 'config.php';

if(!empty($_POST['txt_servico'])){
    $nome = $_POST['txt_servico'];
    $categoria = $_POST['txt_categoria'];
    $preco = $_POST['txt_preco'];
    $descricao = $_POST['txt_descricao'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO servicos (idcategoria, nome, preco,descricao, foto) VALUES (?, ?, ?,?,?)");
        $insert->bindValue(1, $categoria);
        $insert->bindValue(2, $nome);
        $insert->bindValue(3, $preco);
        $insert->bindValue(4, $descricao);
        $insert->bindValue(5, $foto);
        $insert->execute();

        header("Location:pgservico.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM servicos WHERE idservico = ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgservico.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE servicos SET idcategoria = ?, nome=?, preco = ?, descricao =? WHERE idservico = ?");
        $edit->bindValue(1, $categoria);
        $edit->bindValue(2, $nome);
        $edit->bindValue(3, $preco);
        $edit->bindValue(4, $descricao);
        $edit->bindValue(5, $id);
        $edit->execute();
        header("Location:pgservico.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE servicos SET idcategoria = ?, nome=?, preco = ?, descricao =?, foto = ? WHERE idservico = ?");
            $edit->bindValue(1, $categoria);
            $edit->bindValue(2, $nome);
            $edit->bindValue(3, $preco);
            $edit->bindValue(4, $descricao);
            $edit->bindValue(5, $foto);
            $edit->bindValue(6, $id);
            $edit->execute();
    
            header("Location:pgservico.php");
        }
    }
}

?>