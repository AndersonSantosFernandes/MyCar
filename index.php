<?php
include_once("conexao.php");
include_once("model/Mensageira.php");
$msgs = new Mensageira();

$showMsg = $msgs->getMessage();

if (!empty($showMsg["message"])) {
    $msgs->clearMessage();
}


if (isset($_SESSION['usuario'])) {

    $msgs->setMessage("Para encerrar clique em sair", "failure");

    header("location:initial.php");


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
    <link rel="stylesheet" href="css/style.css">
    <title>My Car</title>
</head>
<header class="cabecalho">
    <!-- Formulário de login -->
    <form action="autenticar.php" method="post" id="logar">
        <input type="hidden" name="action" value="login">
        <div class="row">
            <div class="col-md-2 mduser"> </div>
            <div class="col-md-4"><i class="fas fa-envelope-square icon"></i><input class="prin" type="email"
                    name="email" id="email" placeholder="E-mail"></div>
            <div class="col-md-4"><i class="fas fa-key icon"></i><input class="prin" type="password" name="pass"
                    id="pass" placeholder="Senha"></div>
            <div class="col-md-1"><input type="submit" value="Logar" class="btnInicio"></div>

        </div>
    </form>
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

<body>
    <div class="container login ">
        <h1 class="title">Meu carro</h1>
        <div class="row">
            <div class="col-md-12 presnt">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inicial">
                            <p>Olá. aqui voce terá um histórico de tudo sobre seu carro </p>
                            <ul>
                                <p>Manutenções</p>
                                <p>Gastos</p>
                                <p>Históricos</p>
                                <p>Datas</p>
                            </ul>
                            <p>Para se cadastras é só clicar no botão abaixo: <br>
                                <button onclick="showForm()" class="btnInicio">Cadastrar</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="cadastrar1">
            <form action="process.php" method="post">
                <p>Insira um email e senha para se cadastrar</p>
                <input type="hidden" name="action" value="cadastrar">
                <div>
                    <input type="email" name="email" id="email" placeholder="E-mail">
                </div>
                <div>
                    <input type="password" name="pass" id="pass" placeholder="Senha" minlength="6" maxlength="12">
                </div>
                <div>
                    <input type="password" name="confPass" id="confPass" placeholder="Confirma Senha" minlength="6"
                        maxlength="12">
                </div>
                <div>
                    <input type="submit" value="Cadastrar">
                </div>
            </form>
            <button onclick="hideForm()" class="btnInicio" id="cancel" style="margin-bottom: 10px;">Cancelar</button>

        </div>

    </div>
    <script>

        function showForm() {
            var mostraForm = window.document.getElementById("cadastrar1");
            mostraForm.style.top = "90px"
        }
        function hideForm() {
            var mostraForm = window.document.getElementById("cadastrar1");
            mostraForm.style.top = "-300px"
        }




    </script>



    <?php
    include_once("template/footer.php");
    ?>