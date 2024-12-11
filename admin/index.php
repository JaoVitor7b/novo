<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maria Santana admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="website icon" type="png" href="../assets/imagens/logolight.png">
</head>
<body>
    <?php include 'menu.php';?>

    <script src="../assets/javascript/bootstrap.bundle.min.js"></script>
</body>
</html>