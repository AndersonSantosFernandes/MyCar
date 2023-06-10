
<?php
include_once("template/header.php");

$carId = filter_input(INPUT_POST,"carId");
if(!$carId){
    $msgs->setMessage("Não tente dar uma de esperto e acessar pala url","failure");
    header("location:initial.php");
    }
$stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = :car_id");
$stmt->bindParam(":car_id",$carId);
$stmt->execute();

$returnCar = $stmt->fetch();



?>
<div class="container login">
    <h1>Deletar carro</h1>
    <div class="row">
        <div class="col-md-6 offset-3 formEditCar">
            <h4 class="hdelcar">Ao clicar em deletar serão apagado todos os dados do veículo e todo histórico de manutenção e consumo.</h4>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="delCar">
                <div><label for="carId">ID</label>
                    <input type="text" name="carId" id="carId" value="<?= $returnCar["car_id"] ?>" value="<?= $returnCar["car_id"] ?>" readonly>
                </div>
                <div>
                <div><label for="marca">Marca</label>
                    <input type="text" name="marca" id="marca" value="<?= $returnCar["marca"] ?>" readonly>
                </div>
                <div>
                <div><label for="modelo">Modelo</label>
                    <input type="text" name="modelo" id="modelo" value="<?= $returnCar["modelo"] ?>" readonly>
                </div>
                <div>
                <div><label for="ano">Ano</label>
                    <input type="text" name="ano" id="ano" value="<?= $returnCar["ano"] ?>" readonly>
                </div>
                <div>
                <div><label for="Placa">Placa</label>
                    <input type="text" name="placa" id="placa" value="<?= $returnCar["placa"] ?>" readonly>
                </div>
                <div>
                <div><label for="user">Usuário</label>
                    <input type="text" name="user" id="user" value="<?= $returnCar["user"] ?>" readonly>
                </div>
                <input type="submit" value="Deletear">
            </form>
            
        </div>
        
    </div>

    <!-- <a href="initial.php"><button class="btnInicio">Voltar</button></a> -->

    
    

</div>

<?php
include_once("template/header.php");
?>