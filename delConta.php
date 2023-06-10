<?php
include_once("template/header.php");
include_once("queryes.php");
include_once("check_login.php");
?>
<div class="container login ">
    <div class="deletarConta">
        <h3>Quer realmente apagar sua conta?</h3>
        <h4>
            Ao prosseguir todos os dados relacionados ao seu usuário serão apagados irreversívelmente.
            Se deseja prosseguir, clique em Deletar ou em Início par desistir.
        </h4>
        <br>
        <div class="row">
            <div class="col-md-6">
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="delConta">
                    <input class="btnManutencao" type="submit" value="Deletear conta">
                </form>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
<?php
include_once("template/footer.php");
?>