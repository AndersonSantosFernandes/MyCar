<?php
include_once("template/header.php");
include_once("queryes.php");

$carId = filter_input(INPUT_POST, "carId");
//Inpede de acessar direto pela url. Se nã vier um Id por post, redireciona para o inicio
if (!$carId) {
    $msgs->setMessage("Não tente dar uma de esperto e acessar pala url", "failure");
    header("location:initial.php");
}

// query que retorna registros com esse id
$stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = :car_id");
$stmt->bindParam(":car_id", $carId);
$stmt->execute();
$returnCar = $stmt->fetch();
//Query qu retorna somas de valores gasto de com carros pertencentes e esse ID
$stmtTotal = $conn->prepare("SELECT sum(value) FROM maintenance WHERE id_carro = :id_carro");
$stmtTotal->bindParam(":id_carro",$carId);
$stmtTotal->execute();
$showTotal = $stmtTotal->fetch();



?>

<div id="newManutencao">
<h3>
                    <?= $returnCar["modelo"] ?>
                </h3>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="manutencao">
                    <input type="hidden" name="carId" value="<?= $carId ?>">
                    <input type="hidden" name="user" value="<?= $returnCar["user"] ?>">
                    <div>
                        <select name="services" id="services">
                            <option value="">Selecione</option>
                            <option value="Corretiva">Corretiva</option>
                            <option value="Preventiva">Preventiva</option>
                        </select>
                        
                    </div>
                    <textarea name="descricao" id="descricao" maxlength="200" placeholder="Descrição"></textarea>
                    <div>
                        <input type="text" name="valor" id="valor" placeholder="Valor">
                    </div>
                    <div>
                        <input type="date" name="data" id="data">
                    </div>
                    <input type="submit" value="Salvar">
                </form>
                <button class="btnInicio" onclick="hideForm()">Cancelar</button>
                <h3>Total gasto com esse carro: R$ <?= formatMoney( $showTotal['sum(value)'])?></h3>
</div>
<div class="container login">

    <div class="row">

    <div class="col-md-3">
            <h1 >Nova manutenção</h1>
            <button id="btnShow" onclick="showForm()" class="btnInicio">Novo</button>
        
            
            <!--  -->
        </div>
        <div class="col-md-9">
            <h1>Manutenções <?= $returnCar["modelo"] ?></h1>
            
            <?php foreach ($showManut as $show): ?>
                <!-- O if filtra id do carro com certo usuario para vir somente um carro por usuário -->
                <?php if ($show['car_id'] == $carId): ?> 
                    <div class="showManutencao">
                        <h4>
                            <?= $show['modelo'] ?>
                        </h4>
                        <h4>
                            <?= $show['services'] ?>
                        </h4>
                        <h4>
                            <?= $show['description'] ?>
                        </h4>
                        <h4>
                            R$ <?= formatMoney($show['value']) ?>
                        </h4>
                        <h4>
                            <?= invertDate($show['serviceDate']) ?>
                        </h4>
                    </div>
                    <br>
                <?php endif; ?>
            <?php endforeach; ?>


        </div>
       
    </div>


    <script src="script/script.js"></script>






    <br>





</div>
<script>
    function showForm(){
    var show = document.getElementById("newManutencao")
    
    show.style.top="100px"
    

}
function hideForm(){
    var show = document.getElementById("newManutencao")
    
    show.style.top="-460px"
    

}
</script>
<?php
include_once("template/header.php");
?>