<?php
include_once("template/header.php");
include_once("queryes.php");
include_once("check_login.php");

$carId = filter_input(INPUT_POST, "carId");

//Inpede de acessar direto pela url. Se nã vier um Id por post, redireciona para o inicio
if (!$carId) {
    $msgs->setMessage("Não vai direto pela url, espertinho!!!", "failure");
    header("location:initial.php");
}
// query que retorna registros com esse id
$stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = :car_id");
$stmt->bindParam(":car_id", $carId);
$stmt->execute();
$returnCar = $stmt->fetch();

//Query qu retorna somas de valores gasto de com carros pertencentes e esse ID
$stmtTotal = $conn->prepare("SELECT sum(valor) FROM pedagio WHERE car_id = :id_carro");
$stmtTotal->bindParam(":id_carro", $carId);
$stmtTotal->execute();
$showTotal = $stmtTotal->fetch();

?>
<div id="newConsumo">
    <form action="process.php" method="post" >
        <h2>
            <?= $returnCar["modelo"] ?>
        </h2>
        <input type="hidden" name="carId" value="<?= $carId ?>">
        <input type="hidden" name="action" value="pedagio">
        <div>
            <select name="destino" id="destino" class="imputFuel">
                <option value="">Destino</option>
                <option value="Casa">Casa</option>
                <option value="Trabalho">Trabalho</option>
                <option value="Centro">Centro</option>
                <option value="Interior">Interior</option>
                <option value="Litoral">Litoral</option>
            </select>
        </div>
        <div>
            <input type="text" name="valor" id="" placeholder="Valor pago" class="imputFuel">
        </div>
       

        <input type="submit" value="Salvar" class="btnInicio">
    </form>
    <button class="btnInicio" onclick="hideForm()">Cancelar</button>
    <hr>
    <h4>Total gasto com esse carro: <br>R$ <?= formatMoney($showTotal[0]) ?></h4>
</div>

<div class="container login ">
    <div class="row">
        <div class="col-md-2">
        <h3>Consumos </h3>
        <button id="btnShow" onclick="showForm()" class="btnInicio">Novo</button>
        </div>
        <div class="col-md-10">
            <h3>Relatório </h3>

            <table id="tbConsumo">
                <tr>
                    <td>
                        <h5>Destino:</h5>
                    </td>
                    <td>
                        <h5>Vlr pago:</h5>
                    </td>                   
                   
                    <td>
                        <h5>Data:</h5>
                    </td>
                </tr>

                <?php foreach ($showPedagio as $show): ?>
                    <!-- O if filtra id do carro com certo usuario para vir somente um carro por usuário -->
                    <?php if ($show['car_id'] == $carId): ?>

                        <tr>
                            <td>
                                <h5>
                                    <?= $show['destino'] ?>
                                </h5>
                            </td>
                            <td>
                                <h5>
                                    R$
                                    <?= formatMoney($show['valor']) ?>
                                </h5>
                            </td>
                           
                           
                            <td>
                                <h5>
                                    <?= invertDate($show['pedagio_data']) ?>
                                </h5>
                            </td>

                        </tr>


                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


</div>

<script>
    function showForm(){
    var show = document.getElementById("newConsumo")
    
    show.style.top="100px"
    

}
function hideForm(){
    var show = document.getElementById("newConsumo")
    
    show.style.top="-380px"
    

}
</script>

<?php
include_once("template/footer.php");
?>