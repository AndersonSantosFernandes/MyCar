<?php
include_once("conexao.php");
include_once("queryes.php");

require_once 'vendor/autoload.php';
$vlrTlManut = $showSomaManut[0];
$vlrTlConsumo = $showSomaConsumo[0];
$vlrTlPedagio = $showSomaPedagio[0];
$nrCars = $lineCar;
use Dompdf\Dompdf;

$html = '<!DOCTYPE html>';
$html .= '<html lang="pt-br">';
$html .= '<head>';
$html .= '<meta charset="UTF-8">';
$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
$html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$html .= '<link rel="stylesheet" href="css/style.css">';
$html .= '<title>Relatório geral</title>';
$html .= '</head>';

$html .= '
<style>

table{
    width:100%;
    border: 1px solid black;
    border-collapse: collapse;
}
table td{
   padding: 2px 5px;
    border: 1px solid black;
}
table thead{
    font-weight: bold;
 }
 h2{
    background-color: beige;
    padding:3px;
    text-align: center;
 }
</style>';


$html .= '<h2>Relatório geral de manutenção, consumo e pedágio</h2>';
if ($nrCars == 1) {
    $html .= '<h3>Você tem ' . $nrCars . ' veículo</h3>';
} elseif ($nrCars > 1) {
    $html .= '<h3>Você tem ' . $nrCars . ' veículos</h3>';
} else {
    $html .= '<h3>Nenhum veículo cadastrado</h3>';
}








$html .= '<body>';

//Tabela de manutenções
if ($lineManut < 1) {
    $html .= '<h3>Nenhuma manutenção ainda</h3>';
} else {
    $html .= '<table>';
    $html .= '<thead>';
    $html .= '
                <tr>
                <td colspan="3">Gerenciamento geral manutenção</td>
                <td colspan="2"> Total manut. R$ ' . $vlrTlManut . '</td>
                </tr>';
    $html .= '<tr>';
    $html .= '<td>Modelo</td>';
    $html .= '<td>Tipo</td>';
    $html .= '<td>descrição</td>';
    $html .= '<td>Valor</td>';
    $html .= '<td>Data</td>';
    $html .= '</tr>';
    $html .= '</thead>';

    foreach ($showManut as $manut) {


        $html .= '<tbody>';
        $html .= '<tr><td>' . $manut['modelo'] . '</td>';
        $html .= '<td>' . $manut['services'] . '</td>';
        $html .= '<td>' . $manut['description'] . '</td>';
        $html .= '<td> R$ ' . $manut['value'] . '</td>';
        $html .= '<td>' . invertDate($manut['serviceDate']) . '</td></tr>';
        $html .= '</tbody>';

    }
    $html .= '</table>';

}
$html .= '<br>';

// Tabela de consumos

if ($lineConsum < 1) {
    $html .= '<h3>Nenhum consumo ainda</h3>';
} else {
    $html .= '<table>';
    $html .= '<thead>';
    $html .= '
    <tr>
    <td colspan="5">Gerenciamento geral consumo</td>
    <td colspan="2">Total consumo R$ ' . $vlrTlConsumo . '</td>
    </tr>';
    $html .= '<tr>';
    $html .= '<td>Modelo</td>';
    $html .= '<td>Combustível</td>';
    $html .= '<td>Valor pago</td>';
    $html .= '<td>Valor bomba</td>';
    $html .= '<td>Km</td>';
    $html .= '<td>Litros</td>';
    $html .= '<td>Data</td>';
    $html .= '</tr>';
    $html .= '</thead>';

    foreach ($showConsum as $consum) {


        $html .= '<tbody>';
        $html .= '<tr><td>' . $consum['modelo'] . '</td>';
        $html .= '<td>' . $consum['fuelType'] . '</td>';
        $html .= '<td>' . $consum['vlrPay'] . '</td>';
        $html .= '<td> R$ ' . $consum['vlrPump'] . '</td>';
        $html .= '<td>' . $consum['kms'] . '</td>';
        $html .= '<td>' . $consum['litros'] . '</td>';

        $html .= '<td>' . invertDate($consum['dataFuel']) . '</td></tr>';
        $html .= '</tbody>';

    }
    $html .= '</table>';

}
$html .= '<br>';
// Tabela de pedágio

if ($lineConsum < 1) {
    $html .= '<h3>Nenhum pedágio ainda</h3>';
} else {
    $html .= '<table>';
    $html .= '<thead>';
    $html .= '
    <tr>
    <td colspan="2">Gerenciamento geral pedágio</td>
    <td colspan="2">Total pedágio R$ ' . $vlrTlPedagio . '</td>
    </tr>';
    $html .= '<tr>';
    $html .= '<td>Carro</td>';
    $html .= '<td>Destino</td>';
    $html .= '<td>Valor pago</td>';
    $html .= '<td>Data</td>';
    $html .= '</tr>';
    $html .= '</thead>';

    foreach ($showPedagio as $pedagio) {


        $html .= '<tbody>';
        $html .= '<tr><td>' . $pedagio['modelo'] . '</td>';
        $html .= '<td>' . $pedagio['destino'] . '</td>';
        $html .= '<td>' . $pedagio['valor'] . '</td>';
        $html .= '<td>' . invertDate($pedagio['pedagio_data']) . '</td></tr>';
        $html .= '</tbody>';

    }
    $html .= '</table>';

}


$html .= '<br>' . $user . '';
$html .= '</body>';
$html .= '</html>';


//instanciando a classe dompdf
$dompdf = new Dompdf;


//convertendo  o html
$dompdf->loadHtml($html); //Carrega todas as variaveis onde a primeira é normal e todas as outras devem ser concatenadas "variavel .= 'codigo html'".

// definir o tamanho e aorientação do papel "portrait = retrato" "landscape = paisagem"
$dompdf->setPaper('A4', 'portrait');

//Renderizando o html na tela
$dompdf->render();


//Enviar o PDF para o browser ---- 'Attachment => false' impede que o arquivo seja baixado automaticamente.
$dompdf->stream('relatorio.pdf', array('Attachment' => false));

?>