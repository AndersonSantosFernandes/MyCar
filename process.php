<?php
include_once("conexao.php");
include_once("model/Mensageira.php");

$msgs = new Mensageira();
$adm = 0;
$tema = 0;
$user2 = $_SESSION['usuario'];//resgata o usuário logado nasessão
$action = filter_input(INPUT_POST, "action");
$login = filter_input(INPUT_POST, "act");
$email = filter_input(INPUT_POST, "email");
$senha = filter_input(INPUT_POST, "pass");
$confSenha = filter_input(INPUT_POST, "confPass");
$user = filter_input(INPUT_POST, "user");
$marca = filter_input(INPUT_POST, "marca");
$modelo = filter_input(INPUT_POST, "modelo");
$ano = filter_input(INPUT_POST, "ano");
$placa = strtoupper(filter_input(INPUT_POST, "placa"));
$carId = filter_input(INPUT_POST, "carId");
$services = filter_input(INPUT_POST, "services");
$descricao = filter_input(INPUT_POST, "descricao"); //recebe descrição e tipo de combustível
$valor = filter_input(INPUT_POST, "valor");
$data = filter_input(INPUT_POST, "data");
$vlrLitro = filter_input(INPUT_POST, "vlrLitro");
$hodometro = filter_input(INPUT_POST, "hodometro");
$coment = filter_input(INPUT_POST, "comentar");

if ($action == "login") {
    echo $login;
    $msgs->setMessage("Até aqui está correto", "win");
} elseif ($action == "destroy") {
    session_destroy();

    $msgs->setMessage("Sessao derrubada", "win");
    header("location:index.php");
} elseif ($action == "cadastrar") {

    if ($email && $senha && $confSenha) {

        $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name");
        $stmt->bindParam(":name", $email);
        $stmt->execute();
        $contar = $stmt->rowCount();

        if ($contar > 0) {
            $msgs->setMessage("Este nome de e-mail já está em uso! Tente outro", "failure");
        } else {
            if ($senha != $confSenha) {
                $msgs->setMessage("As senhas são diferentes", "failure");
            } else {

                $stmtCad = $conn->prepare("INSERT INTO users (name,password, admin, tema)VALUES (:name, md5(:password),:admin, :tema)");

                $stmtCad->bindParam(":name", $email);
                $stmtCad->bindParam(":password", $senha);
                $stmtCad->bindParam(":admin", $adm);
                $stmtCad->bindParam(":tema", $tema);

                $stmtCad->execute();
                $msgs->setMessage("Cadastrado com sucesso", "win");
            }

        }
    } else {
        $msgs->setMessage("Preencha todos os campos", "failure");
    }
    header("location:index.php");
} elseif ($action == "newCar") {

    if ($marca && $modelo && $ano && $placa) {

        $stmt = $conn->prepare("INSERT INTO cars (marca, modelo, ano, placa, user)
        VALUES(:marca,:modelo,:ano,:placa, :user)");

        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":modelo", $modelo);
        $stmt->bindParam(":ano", $ano);
        $stmt->bindParam(":placa", $placa);
        $stmt->bindParam(":user", $user2);

        $stmt->execute();

        $msgs->setMessage("Seu carro de marca: " . $marca . ", modelo: " . $modelo . " e ano: " . $ano . " Foi cadastrado com sucesso", "win");

    } else {

        $msgs->setMessage("Preencha todos os campos", "failure");

    }

    header("location:initial.php");

} elseif ($action == "delCar") {
    if ($carId) {

        $stmtManut = $conn->prepare("DELETE FROM maintenance WHERE id_carro = :id");
        $stmtManut->bindParam(":id",$carId);
        $stmtManut->execute();

        $stmtConsum = $conn->prepare("DELETE FROM consumo WHERE car_id = :id");
        $stmtConsum->bindParam(":id",$carId);
        $stmtConsum->execute();

        $stmtCar = $conn->prepare("DELETE FROM cars WHERE car_id = :id");
        $stmtCar->bindParam(":id",$carId);
        $stmtCar->execute();

        $msgs->setMessage("Veículo e informações foram deletadas", "win");
    } else {
        $msgs->setMessage("Não deixe nada vazio seu pateta", "failure");
    }
    header("location:initial.php");
} elseif ($action == "manutencao") {

    if ($services && $descricao && $valor && $data && $descricao) {
        $stmt = $conn->prepare("INSERT INTO maintenance (services,description,value,serviceDate,id_carro)
        VALUES(:services,:description,:value,:serviceDate,:id_carro)");

        $stmt->bindParam(":services", $services);
        $stmt->bindParam(":description", $descricao);
        $stmt->bindParam(":value", $valor);
        $stmt->bindParam(":serviceDate", $data);
        $stmt->bindParam(":id_carro", $carId);

        $stmt->execute();
        $msgs->setMessage("Manutenção salva com sucesso", "win");

    } else {
        $msgs->setMessage("Preencha todos os campos", "failure");
    }
    header("location:initial.php");


} elseif ($action == "fuel") {

    if ($descricao && $valor && $vlrLitro && $hodometro) {

        $litros = number_format($valor/$vlrLitro , 2,null,null) ;

        $stmt = $conn->prepare("INSERT INTO consumo (fuelType,vlrPay, vlrPump, kms, car_id, dataFuel,litros)
        VALUES(:fuelType,:vlrPay, :vlrPump, :kms, :car_id, CURRENT_DATE, :litros)");

        $stmt->bindParam(":fuelType", $descricao);
        $stmt->bindParam(":vlrPay", $valor);
        $stmt->bindParam(":vlrPump", $vlrLitro);
        $stmt->bindParam(":kms", $hodometro);
        $stmt->bindParam(":car_id", $carId);
        $stmt->bindParam(":litros",$litros);

        $stmt->execute();

        $msgs->setMessage("Salvo com sucesso", "win");
    } else {
        $msgs->setMessage("Preencha todos os campos", "failure");
    }

    header("location:initial.php");
} elseif ($action == "pass") {
    if ($senha && $confSenha) {
        if ($senha != $confSenha) {

            $msgs->setMessage("Senhas não conferem", "failure");
        } else {
            $stmt = $conn->prepare("UPDATE users SET password = md5(:password) WHERE name = :name");
            $stmt->bindParam(":password", $senha);
            $stmt->bindParam(":name",$user);
            $stmt->execute();

            $msgs->setMessage("Alterado com sucesso", "win");
        }

    } else {
        $msgs->setMessage("Prencha corretamente", "failure");
    }

    header("location:senha.php");
} elseif ($action == "delConta") {

    $stmtSelect = $conn->prepare("SELECT cr.car_id FROM users us INNER JOIN cars cr WHERE us.name = cr.user AND us.name = :name");
    $stmtSelect->bindParam(":name",$user2);
    $stmtSelect->execute();
    $showAll = $stmtSelect->fetchAll();

    

  
    foreach($showAll as $show){
        $carro =  $show['car_id'];
      
        $stmtDelManut = $conn->prepare("DELETE FROM maintenance WHERE id_carro = :car_id");
        $stmtDelManut->bindParam(":car_id",$carro);
        $stmtDelManut->execute();

        $stmtDelConsum = $conn->prepare("DELETE FROM consumo WHERE car_id = :car_id");
        $stmtDelConsum->bindParam(":car_id",$carro);
        $stmtDelConsum->execute();

        $stmtDelCar = $conn->prepare("DELETE FROM cars WHERE car_id = :car_id");
        $stmtDelCar->bindParam(":car_id",$carro);
        $stmtDelCar->execute();

      
    }

    $stmtDelComent = $conn->prepare("DELETE FROM comentarios WHERE user = :user");
    $stmtDelComent->bindParam(":user",$user2);
    $stmtDelComent->execute();

    $stmtDelUser = $conn->prepare("DELETE FROM users WHERE name = :name");
    $stmtDelUser->bindParam(":name",$user2);
    $stmtDelUser->execute();

    
    $msgs->setMessage("Deletedo com sucesso","win");
    
    
    header("location:index.php");
    session_destroy();
    exit;
} elseif ($action == "coment") {

    if($coment && strlen($coment) > 29 ){
        $stmt = $conn->prepare("INSERT INTO comentarios(coment,user, dtComent)VALUES (:coment, :user, CURRENT_DATE)");
        $stmt->bindParam(":coment",$coment);
        $stmt->bindParam(":user",$user2);
        $stmt->execute();
        
        $msgs->setMessage("Comentário".$cont." salvo","win"); 
    }else{
        $msgs->setMessage("Comentário não salvo! Insira ao menos 30 caracteres","failure");
    }

  

 header("location:comentarios.php");
} elseif ($action == "tema") {

    $stmt = $conn->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->bindParam(":name",$user2);
    $stmt->execute();
    $showTema = $stmt->fetch();
    
    
    if($showTema['tema'] == 0){
        $tema = 1;
    }elseif($showTema['tema'] == 1){
        $tema = 0;
    }

    $stmtTema = $conn->prepare("UPDATE users SET tema = :tema WHERE name = :name");
    $stmtTema->bindParam(":tema",$tema);
    $stmtTema->bindParam(":name",$user2);
    $stmtTema->execute();

    header("location:initial.php");
}

?>

