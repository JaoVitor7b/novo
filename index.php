  <?php 
include 'admin/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Solstice Tech Solutions</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="website icon" type="png" href="assets/imagens/logolight.png">
    <style>
        /* Evitar o overflow horizontal */
        html, body {
            width: 100%;
            overflow-x: hidden;  /* Ocultar qualquer excesso horizontal */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 100%;  /* Evitar que o container ultrapasse a largura da tela */
            padding-left: 15px; /* Pequeno padding para evitar que o conteúdo toque as bordas */
            padding-right: 15px; /* Também um pequeno padding à direita */
        }

        .img-container {
            text-align: center;
        }
        .text-center p {
            margin: 20px 0;
        }

        /* Melhorias de layout */
        .content {
            max-width: 960px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<a id="navegacao"></a>
<?php include 'navegacao.php'?>

<a id="sobre"></a>
<?php include 'sobre.php'?>

<a id="cards"></a>
 <?php include 'cards.php';?>

<a id="social"></a>
 <?php include 'social.php';?>

<a id="rodape"></a>
 <?php include 'rodape.php';?>

    <script type="text/javascript" src="assets/javascript/bootstrap.bundle.min.js"></script>    


    </body>

</html>