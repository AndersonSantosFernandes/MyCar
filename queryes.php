<?php 

include_once("conexao.php");
//Recebe o usuário logado na sessão para retornar dados relacionados e ele
if(isset($_SESSION["usuario"])){
    $user = $_SESSION["usuario"]; 
}

//Retorna informações para diferir administrador e usuário comum
$stmtUser = $conn->prepare("SELECT* FROM users WHERE name = :name");
$stmtUser->bindParam(":name",$user);
$stmtUser->execute();
$showUser = $stmtUser->fetch();
$admin = $showUser['admin'];
$tema = $showUser['tema'];

//Retorna os carros ligados ao usuário logado
$stmt = $conn->prepare("SELECT * FROM cars WHERE user = :user");
$stmt->bindParam(":user",$user);
$stmt->execute();
$showCars = $stmt->fetchAll();
$lineCar = $stmt->rowCount();

//Retorna as manutenções ligadas ao usuário logado
$stmtManut = $conn->prepare("SELECT * FROM maintenance ma 
INNER JOIN cars ca 
WHERE ma.id_carro = ca.car_id AND ca.user = :user");
$stmtManut->bindParam(":user",$user);
$stmtManut->execute();
$showManut = $stmtManut->fetchAll();
$lineManut = $stmtManut->rowCount();

//Retorna os consumos de combustível relacionados ao usuário logado
$stmtConsum = $conn->prepare("SELECT * FROM consumo co 
INNER JOIN cars ca 
WHERE co.car_id = ca.car_id AND ca.user = :user");
$stmtConsum->bindParam(":user",$user);
$stmtConsum->execute();
$showConsum = $stmtConsum->fetchAll();
$lineConsum = $stmtConsum->rowCount();

//Retorna os consumos de pedágios relacionados ao usuário logado
$stmtPedagio = $conn->prepare("SELECT * FROM pedagio pe
INNER JOIN cars ca 
WHERE pe.car_id = ca.car_id AND ca.user = :user");
$stmtPedagio->bindParam(":user",$user);
$stmtPedagio->execute();
$showPedagio = $stmtPedagio->fetchAll();
$linePedagio = $stmtPedagio->rowCount();

//Administrador encherga os comentários de todos o usuários
if($admin == 1 ){
    $stmtComent = $conn->prepare("SELECT * FROM comentarios");
    $stmtComent->execute();
    $showComent = $stmtComent->fetchAll();
    $lineComent = $stmtComent->rowCount();
    //Usuário ve apenas seus proprios comentários
}else{
    $stmtComent = $conn->prepare("SELECT * FROM comentarios WHERE user = :user");
    $stmtComent->bindParam(":user",$user);
    $stmtComent->execute();
    $showComent = $stmtComent->fetchAll();
    $lineComent = $stmtComent->rowCount();
}
//Retorna total gasto com manutenções
$stmtSomaManut = $conn->prepare("SELECT SUM(man.value) FROM users us INNER JOIN cars cr INNER JOIN maintenance man WHERE
us.name = cr.user AND
cr.car_id = man.id_carro AND
us.name = :name");

$stmtSomaManut->bindParam(":name",$user);
$stmtSomaManut->execute();
$showSomaManut = $stmtSomaManut->fetch();

//Retorna o total gasto com combustível
$stmtSomaConsumo = $conn->prepare("SELECT SUM(con.vlrPay) FROM users us INNER JOIN cars cr INNER JOIN consumo con WHERE
us.name = cr.user AND
cr.car_id = con.car_id AND
us.name = :name");

$stmtSomaConsumo->bindParam(":name",$user);
$stmtSomaConsumo->execute();
$showSomaConsumo = $stmtSomaConsumo->fetch();

//Retorna o total gasto com pedágio
$stmtSomaPedagio = $conn->prepare("SELECT SUM(ped.valor) FROM users us INNER JOIN cars cr INNER JOIN pedagio ped WHERE
us.name = cr.user AND
cr.car_id = ped.car_id AND
us.name = :name");

$stmtSomaPedagio->bindParam(":name",$user);
$stmtSomaPedagio->execute();
$showSomaPedagio = $stmtSomaPedagio->fetch();


?>