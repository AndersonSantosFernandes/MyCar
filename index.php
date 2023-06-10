<?php
include_once("template/header.php");
?>

<div class="container login ">
    <h1 class="title">Meu carro</h1>
    <div class="row">
        <div class="col-md-12 presnt">
            <div class="row">
                <div class="col-md-12">
                    <div class="inicial">
                        <p>Olá. aqui voce terá um histórico de tudo sobre seu carro </p>
                        <ul>
                            <p>Manutenções</p>
                            <p>Gastos</p>
                            <p>Históricos</p>
                            <p>Datas</p>
                        </ul>
                        <p>Para se cadastras é só clicar  no botão abaixo: <br><button onclick="showModal()" class="btnInicio">Cadastrar</button></p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="divformCad">

        <div id="modal">

        </div>

    </div>

</div>
<script src="script/script.js"></script>
<?php
include_once("template/footer.php");
?>