<?php
include 'config.php';

if(!empty($_POST['txt_categoria'])){
    $categoria = $_POST['txt_categoria'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", "", $foto);
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "imagens/".$foto;   
}

if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    if(move_uploaded_file($foto_temp, $destino)){
        $insert = $pdo->prepare("INSERT INTO categorias (categoria, foto) VALUES (?, ?)");
        $insert->bindValue(1, $categoria);
        $insert->bindValue(2, $foto);
        $insert->execute();

        header("Location:pgcategoria.php");
    }
}

if(isset($_GET['acao']) && $_GET['acao'] == "excluir"){
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM categorias WHERE idcategoria = ?");
    $del->bindValue(1, $id);
    $del->execute();
    unlink('imagens/'.$foto);
    header('Location:pgcategoria.php');
}

if(isset($_GET['acao']) && $_GET['acao'] == "editar"){
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    if($_FILES['file_foto']['size'] == 0){
        $edit = $pdo->prepare("UPDATE categorias SET categoria = ? WHERE idcategoria = ?");
        $edit->bindValue(1, $categoria);
        $edit->bindValue(2, $id);
        $edit->execute();
        header("Location:pgcategoria.php");
    }else{
        unlink('imagens/'.$fotodb);
        if(move_uploaded_file($foto_temp, $destino)){
            $edit = $pdo->prepare("UPDATE categorias SET categoria = ?, foto = ? WHERE idcategoria = ?");
            $edit->bindValue(1, $categoria);
            $edit->bindValue(2, $foto);
            $edit->bindValue(3, $id);
            $edit->execute();
    
            header("Location:pgcategoria.php");
        }
    }
}

?>