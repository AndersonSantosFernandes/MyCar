<?php

include_once("conexao.php");
include_once("model/Mensageira.php");
include_once("vendor/autoload.php");


$msgs = new Mensageira(); 

$showMsg = $msgs->getMessage();

if (!empty($showMsg["message"])) {
    $msgs->clearMessage();
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link bootstrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.css"
        integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Link font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Css do projeto-->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <?php include_once("css/style.php")?>
    <title>My Car</title>
</head>

<body>
    <header class="cabecalho">
        <?php if (isset($_SESSION["usuario"])): ?>
            <div class="row rowBtn">
                <div class="col-md-6 offset-2 headBtn">
                    <?= $_SESSION["usuario"] ?>
                </div>
                <!-- formulario de saída de sessão -->
                    <form action="process.php" method="post">
                        <input type="hidden" name="action" value="destroy">
                        <input type="submit" value="Sair" class="btnInicio1">
                    </form>
        
                    <a href="initial.php"> <button class="btnInicio1">Inicio</button> </a>
                    <a href="senha.php"> <button class="btnInicio1">Senha</button> </a>
                
            </div>

        <?php else: ?>
            <!-- Formulário de login -->
            <form action="autenticar.php" method="post" id="logar">
                <input type="hidden" name="action" value="login">
                <div class="row">
                    <div class="col-md-2 mduser">  </div>
                    <div class="col-md-4"><i class="fas fa-envelope-square icon"></i><input class="prin" type="email"
                            name="email" id="email" placeholder="E-mail"></div>
                    <div class="col-md-4"><i class="fas fa-key icon"></i><input class="prin" type="password" name="pass"
                            id="pass" placeholder="Senha"></div>
                    <div class="col-md-1"><input type="submit" value="Logar" class="btnInicio"></div>

                </div>
            </form>
        <?php endif; ?>
    </header>
    
        <?php
        if (!empty($showMsg["message"])) {
            ?>
<p class=" <?= $showMsg["type"] ?>">
            <?= $showMsg["message"] ?>
            <?php
        }
        ?>
    </p>