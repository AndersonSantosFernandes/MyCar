<?php 

include_once("conexao.php");
include_once("model/Mensageira.php");

$msgs = new Mensageira();

$email = filter_input(INPUT_POST,"email");
$pass = filter_input(INPUT_POST,"pass");


$stmt = $conn->prepare("SELECT * FROM users WHERE name = :name and password = md5(:password)");
$stmt->bindParam(":name",$email);
$stmt->bindParam(":password",$pass);
$stmt->execute();

$linha = $stmt->rowCount();


if($linha == 1){
    $msgs->setMessage("Logado com sucesso, Bem vindo!!!","win");
    $_SESSION["usuario"]=$email;
    header("location:initial.php");
}else{
    $msgs->setMessage("Não cadastrado ou e-mail e senha não combinam","failure");
    header("location:index.php");
}


?>