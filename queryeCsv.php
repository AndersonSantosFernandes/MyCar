<?php 

include_once("conexao.php");
if(isset($_SESSION["usuario"])){
    $user = $_SESSION["usuario"]; 
}
//Retorna as manutenções ligadas ao usuário logado
$stmtManut = $conn->prepare("SELECT ca.modelo,ca.placa, ma.services, ma.description, ma.value, ma.serviceDate FROM maintenance ma 
INNER JOIN cars ca 
WHERE ma.id_carro = ca.car_id AND ca.user = :user");
$stmtManut->bindParam(":user",$user);
$stmtManut->execute();
$showManut = $stmtManut->fetchAll(PDO::FETCH_ASSOC);
$lineManut = $stmtManut->rowCount();

//Retorna os consumos de combustível relacionados ao usuário logado
$stmtConsum = $conn->prepare("SELECT ca.modelo, co.fuelType, co.vlrPay, co.vlrPump, co.kms, co.litros, co.dataFuel  FROM consumo co 
INNER JOIN cars ca 
WHERE co.car_id = ca.car_id AND ca.user = :user");
$stmtConsum->bindParam(":user",$user);
$stmtConsum->execute();
$showConsum = $stmtConsum->fetchAll(PDO::FETCH_ASSOC);
$lineConsum = $stmtConsum->rowCount();

//Retorna os consumos de pedágios relacionados ao usuário logado
$stmtPedagio = $conn->prepare("SELECT ca.modelo, pe.destino, pe.valor, pe.pedagio_data FROM pedagio pe
INNER JOIN cars ca 
WHERE pe.car_id = ca.car_id AND ca.user = :user");
$stmtPedagio->bindParam(":user",$user);
$stmtPedagio->execute();
$showPedagio = $stmtPedagio->fetchAll(PDO::FETCH_ASSOC);
$linePedagio = $stmtPedagio->rowCount();



?>