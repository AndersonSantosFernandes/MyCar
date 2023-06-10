<?php 


class Mensageira{

public function setMessage($message, $type){

$_SESSION["message"]=$message;
$_SESSION["type"]=$type;
    
}
public function getMessage(){

    if(!empty($_SESSION["message"])){
        return[
            "message" => $_SESSION["message"],
            "type" => $_SESSION["type"] 
        ];
    }else{
        return false;
    }
}
public function clearMessage(){
    $_SESSION["message"]="";
    $_SESSION["type"]="";
}
}

?>