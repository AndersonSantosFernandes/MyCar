<?php 

include_once("conexao.php");

if(isset($_SESSION["usuario"])){
    $user = $_SESSION["usuario"]; 
}


$stmtUser = $conn->prepare("SELECT* FROM users WHERE name = :name");
$stmtUser->bindParam(":name",$user);
$stmtUser->execute();
$showUser = $stmtUser->fetch();
$admin = $showUser['admin'];
$tema = $showUser['tema'];


$stmt = $conn->prepare("SELECT * FROM cars WHERE user = :user");
$stmt->bindParam(":user",$user);
$stmt->execute();
$showCars = $stmt->fetchAll();
$lineCar = $stmt->rowCount();


$stmtManut = $conn->prepare("SELECT * FROM maintenance ma 
INNER JOIN cars ca 
WHERE ma.id_carro = ca.car_id AND ca.user = :user");
$stmtManut->bindParam(":user",$user);
$stmtManut->execute();
$showManut = $stmtManut->fetchAll();
$lineManut = $stmtManut->rowCount();


$stmtConsum = $conn->prepare("SELECT * FROM consumo co 
INNER JOIN cars ca 
WHERE co.car_id = ca.car_id AND ca.user = :user");
$stmtConsum->bindParam(":user",$user);
$stmtConsum->execute();
$showConsum = $stmtConsum->fetchAll();
$lineConsum = $stmtConsum->rowCount();

if($admin == 1 ){
    $stmtComent = $conn->prepare("SELECT * FROM comentarios");
    $stmtComent->execute();
    $showComent = $stmtComent->fetchAll();
    $lineComent = $stmtComent->rowCount();
}else{
    $stmtComent = $conn->prepare("SELECT * FROM comentarios WHERE user = :user");
    $stmtComent->bindParam(":user",$user);
    $stmtComent->execute();
    $showComent = $stmtComent->fetchAll();
    $lineComent = $stmtComent->rowCount();
}





?>