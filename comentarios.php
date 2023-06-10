<?php
include_once("template/header.php");
include_once("queryes.php");
include_once("check_login.php");
?>

<div class="container login ">
<?php if($admin < 1):?>

<h1>Deixe um comentário ou sugestão</h1>

<div class="comentario">
    <form action="process.php" method="post">
    <input type="hidden" name="action" value="coment">    
        <div>
            <textarea name="comentar" id="comentar" maxlength="200"  placeholder="Deixe um comentátio de até 200 caracteres">

            </textarea>    
        </div>
        <input class="btnManutencao" type="submit" value="Comentar">
    </form>
</div>
<?php else:?>
    <h1>Comentários de usuários</h1>
<?php endif;?>

<?php if($lineComent > 0):?>

    <div class="listComent">
    <?php foreach($showComent as $coment):?>
        <p> Em <strong> <?= invertDate( $coment['dtComent']) ?></strong> o usuário 
        <strong> <?= $coment['user'] ?></strong>
        escreveu o seguinte comentério:</p>
        <p class="pCom"><?= $coment['coment'] ?></p>

    
        
        <?php endforeach;?>
</div>


    <?php else:?>

<h1>Ainda não há comentários</h1>
        <?php endif;?>





</div>

<?php
include_once("template/footer.php");
?>