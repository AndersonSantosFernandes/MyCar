<?php
include_once("queryeCsv.php");
$act = filter_input(INPUT_GET,"act");

$diferenca = strtotime(" -5 hours ");
$datedate = date("dmYHis", $diferenca);

if($act == "manutencao"){
    $desc = mb_convert_encoding("Descrição","ISO-8859-1","UTF-8");
    $cabecalho = ["Carro","Placa","Tipo de manut.",$desc,"Valor","Data"];
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$act.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");

    foreach ($showManut as $manut){

        fputcsv($arquivo , mb_convert_encoding($manut,"ISO-8859-1","UTF-8"), ";" );

    }
    fclose($arquivo);

}elseif($act == "consumo"){
    
    $cabecalho = ["Carro","Combustível","Valor","R$/litro","KM Painel","Litros","Data"];

    header('Content-Disposition: attachment; filename='.$act.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");

    foreach ($showConsum as $consum){

        fputcsv($arquivo , mb_convert_encoding($consum,"ISO-8859-1","UTF-8"), ";" );

    }
    fclose($arquivo);

}elseif($act == "pedagio"){

    $cabecalho = ["Carro","Destino","Valor","Data"];

    header('Content-Disposition: attachment; filename='.$act.'_'.$datedate.'.csv');

    $arquivo = fopen('php://output', 'w');

    fputcsv($arquivo,$cabecalho, ";");
    
    foreach ($showPedagio as $pedagio){

        fputcsv($arquivo , mb_convert_encoding($pedagio,"ISO-8859-1","UTF-8"), ";" );

    }

    fclose($arquivo);
}

?>