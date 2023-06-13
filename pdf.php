<?php
include_once("conexao.php");
include_once("queryes.php");

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$html = '<!DOCTYPE html>';
$html .= '<html lang="pt-br">';
$html .= '<head>';
$html .= '<meta charset="UTF-8">';
$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
$html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$html .= '<link rel="stylesheet" href="css/style.css">';
$html .= '<title>Document</title>';
$html .= '</head>';

$html .='
<style>
table{
    width:100%;
    border: 1px solid black;
    border-collapse: collapse;
}
table td{
   padding: 2px 5px;
    border: 1px solid purple;
}
</style>';


$html .= '<body>';

$html .= '<table>';
$html .= '<thead>';
$html .= '
            <tr>
            <td colspan="3">Gerenciamento geral manutenção</td>
            <td colspan="2"></td>
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
$html .= '<br>';
// ========================================================================
$html .= '<table>';
$html .= '<thead>';
$html .= '
<tr>
<td colspan="5">Gerenciamento geral consumo</td>
<td colspan="2"></td>
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

$html .= '</body>';
$html .= '</html>';
//instanciando a classe dompdf
$dompdf = new Dompdf;


//convertendo  o html
$dompdf->loadHtml($html);

// definir o tamanho e aorientação do papel
$dompdf->setPaper('A4', 'portrait');

//Renderizando o html na tela
$dompdf->render();


//Enviar o PDF para o browser
$dompdf->stream('relatorio.pdf', array('Attachment' => false));

?>