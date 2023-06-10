<?php
include_once("template/header.php");
$user = $_SESSION["usuario"];

?>

<div class="container login">
<h2>Alterar senha</h2>

<div class="formSenha">
    <form action="process.php" method="post" class="formPass">
        <input type="hidden" name="action" value="pass">
        <input type="hidden" name="user" value="<?= $user ?>">
        <div class="divInput">
        <input type="password" name="pass" id="pass" placeholder="Senha" minlength="6" maxlength="12">
    </div>
    <div class="divInput">
        <input type="password" name="confPass" id="confPass" placeholder="Confirma Senha" minlength="6"
            maxlength="12">
    </div>
    <div class="divInput">
        <input type="submit" value="Alterar">
    </div>
    </form>
</div>

</div>

<?php
include_once("template/header.php");
?>