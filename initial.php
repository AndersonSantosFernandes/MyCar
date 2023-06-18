<?php
include_once("template/header.php");

include_once("check_login.php");

?>
<div id="delCarro">

</div>
<div id="delCarro1">
    <form action="process.php" method="post" >
        <input type="hidden" name="action" value="newCar">
        <div>
            <input type="text" name="marca" id="marca" placeholder="Marca">
        </div>
        <div>
            <input type="text" name="modelo" id="modelo" placeholder="Modelo">
        </div>
        <div>
            <input type="number" name="ano" id="ano" placeholder="Ano" maxlength="4">
        </div>
        <div>
            <input type="text" name="placa" id="placa" placeholder="Placa" maxlength="8">
        </div>
        <input type="submit" class="btnManutencao" value="Cadastrar">

    </form>
    <button class="btnInicio" onclick="hideForm()">Cancelar</button>
</div>

<div class="container login ">

    <div class="row">
       
        <div class="col-md-8">

            <h1>Meus carros <button id="btnShow" onclick="showForm()" class="btnInicio">Novo</button></h1>


            <br>
            <?php if ($lineCar > 0): ?>
                <?php foreach ($showCars as $cars): ?>
                    <div class="showCar">

                        <div class="row">
                            <div class="col-md-7">
                                <h5>Marca:
                                    <?= $cars["marca"] ?>
                                </h5>
                                <h5>Modelo:
                                    <?= $cars["modelo"] ?>
                                </h5>
                                <h5>Ano:
                                    <?= $cars["ano"] ?>
                                </h5>
                                <h5>Placa:
                                    <?= $cars["placa"] ?>
                                </h5>
                            </div>
                            <div class="col-md-5">
                                <div class="row rowBtn">


                                    <?php $valorCar = $cars['car_id'] ?>
                                    <button onclick="delCar(<?= $valorCar ?>)" class="btnInicio">Deletear</button>

                                    <form action="consumo.php" method="post">
                                        <input type="hidden" name="carId" value="<?= $cars["car_id"] ?>">
                                        <input type="submit" value="consumo" class="btnInicio">
                                    </form>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 rowManut">
                                        <form action="manutencao.php" method="post">
                                            <input type="hidden" name="carId" value="<?= $cars["car_id"] ?>">
                                            <input type="submit" value="Manutenções" class="btnManutencao">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                <?php endforeach; ?>

            <?php else: ?>

                <h3>Você ainda não tem veículo cadástrado</h3>

            <?php endif; ?>

        </div>
        <div class="col-md-4">
            <h1>Ações</h1>
            <div class="escolha">
                
                
               
                <div>
                    <a href="relatorio.php"><button class="btnManutencao">Relatório geral</button></a>

                </div>
                <div>
                    <a href="comentarios.php"><button class="btnManutencao">Sugestão/Comentário</button></a>

                </div>
                <div>
                    <form action="process.php" method="post">
                        <input type="hidden" name="action" value="tema">
                        <input type="submit" value="Tema" class="btnManutencao">
                    </form>
                </div>
                <div>
                    <a href="delConta.php"><button class="btnManutencao">Excluir conta</button></a>

                </div>
                <div>
                <a href="sobre.php"><button class="btnManutencao">Sobre</button></a>
                </div>



            </div>
        </div>

    </div>


    <br>
</div>
<script>
    function showForm(){
    var show = document.getElementById("delCarro1")
    
    show.style.top="100px"
    

}
function hideForm(){
    var show = document.getElementById("delCarro1")
    
    show.style.top="-380px"
    

}

function delCar(vlrCar){



var modalDelCar = document.getElementById("delCarro")

modalDelCar.innerHTML=
`
<div id="modalDeleteCar">
<h4>Tem certeza?</h4>
<p>Clicando em deletear todos os dados do veículo serão apagados com ele</p>
    <div class="row">            
        <div class="col-md-6 modDel">
        <form  action="process.php" method="post">
        <input type="hidden" name="action" value="delCar">
        <input type="hidden" name="carId" value="${vlrCar}">
        <input class="btnInicio" type="submit" value="Dletar">
    </form>
        </div>
        <div class="col-md-6 modDel">
          
        <button class="btnInicio" onclick="cancelDel()">Cancelar</button>
    
        </div>
    </div>
    
    
</div>

`



}

function cancelDel(){

var modalDelCar = document.getElementById("delCarro")

modalDelCar.innerHTML=``
}


</script>

<?php
include_once("template/footer.php");
?>