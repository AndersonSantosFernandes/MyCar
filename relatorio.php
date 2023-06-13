<?php
include_once("template/header.php");
include_once("queryes.php");

?>

<div class="container login">

    <div class="row">
        <!-- Relatório de manutenção -->
        <div class="col-md-12 relat">
            <h2>Relatório geral de manutenções</h2>
            <hr>
            <?php if( $lineManut > 0):?>
                <table class="tbRelatorio">
                <tr class="trRelatorio">
                    <td>Carro</td>
                    <td class="hideTd">Tipo de manut.</td>
                    <td>Descrição</td>
                    <td class="hideTd">Placa</td>
                    <td>Valor</td>
                    <td>Data</td>                

                </tr>
                <?php foreach ($showManut as $manut): ?>
                  
                    <tr onclick="manutentor()" >
                        <td >
                            <?= $manut['modelo'] ?>
                        </td>
                        <td class="hideTd">
                            <?= $manut['services'] ?>
                        </td>
                        <td>
                            <?= $manut['description'] ?>
                        </td>
                        <td class="hideTd">
                            <?= $manut['placa'] ?>
                        </td>
                        <td>
                            R$ <?= formatMoney( $manut['value']) ?>
                        </td>
                        <td>
                            <?= invertDate( $manut['serviceDate']) ?>
                        </td>
                       
                    </tr> 

                <?php endforeach; ?>
            </table>
                <?php else:?>
                    <h3>Você ainda não tem históricos de manutenção</h3>
                    
                    <?php endif;?>            <!--  -->
           
        </div>
            <!--  -->
    </div><br>
    <div class="row">
        <!-- Relatório de consumo -->
        
        <div class="col-md-12 relat">
            <h2>Relatório geral de consumo</h2>
            <hr>
                <!--  -->
                <?php if($lineConsum > 0):?>
               
                    <table class="tbRelatorio">
                <tr class="trRelatorio">
                    <td>Carro</td>
                    <td>Combustível</td>
                    <td>Valor</td>
                    <td class="hideTd">R$/litro</td>
                    <td class="hideTd">Placa</td>
                    <td>Litros</td>
                </tr>

                <?php  foreach ($showConsum as $consum): ?>
                    <tr>
                        <td><?= $consum["modelo"] ?></td>
                        <td><?= $consum["fuelType"] ?></td>
                        <td>R$ <?=formatMoney( $consum["vlrPay"]) ?></td>
                        <td class="hideTd">R$ <?= formatMoney($consum["vlrPump"]) ?></td>
                        <td class="hideTd"><?= $consum["placa"] ?></td>
                        <td><?= $consum["litros"] ?> L</td>
                    </tr>
                <?php endforeach; ?>
            </table>
                    <?php else:?>
                    
                        <h2>Você ainda não tem históricos de consumo </h2>
                    
                        <?php endif;?>
            
            <!--  -->
        </div>
    </div>
    <div>
            <a href="pdf.php"><button class="btnManutencao">Gerar PDF</button></a>

            </div>
</div>
<script src="script/script.js"></script>
<?php
include_once("template/header.php");
?>