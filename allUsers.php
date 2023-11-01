<?php
include_once("template/header.php");
include_once("queryes.php");
include_once("check_login.php");


?>

<div class="container login ">


    <?php foreach($allUsers as $user):?>
        <div class="showCar" style="padding: 10px ;">
        <?php if($user['admin'] == 1):?>
            <h3>Usuário: <?= $user['name']?> - Admin: Sim </h3>    
            <?php else:?>
                <h3>Usuário: <?= $user['name']?> - Admin: Não </h3>
                <?php endif;?>
                </div>
        <br>

        <?php endforeach;?>


</div>


<?php
include_once("template/footer.php");
?>