<?php 
include_once("template/header.php");
include_once("conexao.php");
include_once("check_login.php");

$idComent = filter_input(INPUT_POST,"idcoment");

if(!isset($idComent)){
header("location:comentarios.php");
}

$stmtComent = $conn->prepare("SELECT * FROM comentarios WHERE coment_id = :coment_id");
    $stmtComent->bindParam(":coment_id",$idComent);
    $stmtComent->execute();
    $showComent = $stmtComent->fetch(PDO::FETCH_ASSOC);

    


?>
<div class="container login ">

<div class="comentario">
    <form action="process.php" method="post">
    <input type="hidden" name="action" value="updateComent">  
    <input type="hidden" name="comentId" value="<?= $showComent['coment_id']?>">  
        <div>
            <textarea name="comentar" id="comentar" maxlength="200">
              <?= $showComent['coment']?>
            </textarea>    
        </div>
        <input class="btnManutencao" type="submit" value="Atualizar">
    </form>
</div>

</div>

<?php
include_once("template/footer.php");
?>


