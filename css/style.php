<?php
include_once("queryes.php");



?>
<style>


<?php if ($tema == 0): ?>
    :root{
    --bgImagem: url("imgs/horizontal1.jpg") ;
    --bgImagem2: url("imgs/vertical1.jpg") ;
    --principalCor:green;
    --secundariaCor: greenyellow;
    --btnCor: rgb(68, 245, 68);
}

<?php elseif ($tema == 1): ?>
    :root{
    --bgImagem: url("imgs/verticalVerm.jpg") ;
    --bgImagem2: url("imgs/vertical.jpg") ;
    --principalCor:red;
    --secundariaCor: pink;
    --btnCor: rgb(235, 54, 54);
}

<?php endif; ?>

    body {
        background-image: var(--bgImagem);        
        background-attachment: fixed;
        background-size: cover;      
    }

    .cabecalho {
        width: 100%;
        background-color: var(--principalCor);
    }

    .cabecalho {
        width: 84%;
        background-color: var(--secundariaCor);
        margin: 0 auto;
        padding: 5px 10px;
        color: var(--principalCor);
        font-size: 20px;
        font-weight: bold;
    }

    /*Mensagem positiva*/
    .win {
        margin-top: 3px;
        width: 70%;
        background-color: green;
        color: green;
        border: 1px solid greenyellow;
        margin: auto;
        text-align: center;
    }

    /*mensagem negativa*/
    .failure {
        margin-top: 3px;
        width: 70%;
        background-color: pink;
        color: red;
        border: 1px solid red;
        margin: auto;
        text-align: center;
    }

    /*Inputs de login*/
    .prin {
        margin-left: 10px;
    }

    /*página de login*/


    #logar input {
        border: none;
        border-radius: 5px;
        padding-left: 7px;
        margin: 5px;
    }

    .btnInicio {
        width: 100px;
        height: 40px;
        background-image: linear-gradient(var(--principalCor), var(--btnCor));
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        /* margin: 5px; */
    }

    .btnManutencao {
        width: 200px;
        height: 40px;
        background-image: linear-gradient(var(--principalCor), var(--btnCor));
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        margin-top: 15px;
    }

    .login {

        /* background-image: url("../imgs/horizontal1.jpg"); */
        /* height: 90vh; */
        /* background-repeat: no-repeat; */
        /* background-size: cover; */
        color: aliceblue;
        /* background-attachment: fixed;  */
    }

    .formCad {
        /* background-color: rgb(43, 143, 231); */
        /* width: 50%; */
        text-align: center;
        padding: 20px;
        border-radius: 10px;
    }

    .divInput {
        margin: 20px auto;
    }

    .divInput input {
        border-radius: 10px;
        border: none;
        padding-left: 10px;
        width: 100%;
    }

    .divformCad {
        position: absolute;
        width: 300px;
        top: 180px;
        left: 50%;
        margin-left: -150px;
    }

    #modal {
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        border-radius: 15px;
        color: black;
        font-weight: bold;
        text-align: center;
    }

    .inicial {
        width: 100%;
        margin: 30px auto;        
    }

    /*pàgina inicial*/
    .rowBtn {
        justify-content: space-around;
    }

    .rowManut {
        text-align: center;
    }

    .formCadCar {
        width: 90%;
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        border-radius: 15px;
        color: black;
        font-weight: bold;
        padding: 20px;
    }

    .formCadCar input {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
        padding-left: 10px;
    }

    .showCar {
        background-color: rgba(240, 248, 255, 0.16);
        padding: 5px 25px;
        border-radius: 15px;
    }
    
    



    /* Modal inicial cadastrar novo veículo
    #newCar {
        position: sticky;
        top: 100px;
        z-index: 30;
    }

    #newCar form {
        position: absolute;
        text-align: center;
        top: 60px;
        left: 50%;
        width: 400px;
        margin-left: -200px;
    } */



    /*Página manutencao.php*/

    .manutCar {
        width: 90%;
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        text-align: center;
        padding: 15px;
        border-radius: 10px;
        opacity: .8;
    }

    .manutCar input {
        width: 90%;
        margin: 10px auto;
        border: none;
        border-radius: 5px;
    }

    #services {
        width: 90%;
        margin: 10px auto;
        border: none;
        border-radius: 5px;
    }

    textarea {
        width: 90%;
        height: 80px;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
    }

    .showManutencao {
        background-color: rgba(240, 248, 255, 0.446);
        padding: 5px 15px;
        border-radius: 10px;
    }


    /*pagina editCar.php*/
    .formEditCar {
        width: 60%;
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        border-radius: 15px;
        color: black;
        font-weight: bold;
        padding: 20px;
        text-align: right;
        opacity: .8;

    }

    .formEditCar input {
        width: 70%;
        margin-right: 60px;
        border-radius: 8px;
        border: none;
        padding: 5px 10px;
        margin-bottom: 8px;
    }

    /*Página consumo.php*/
    .formConsumo {
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        background-size: cover;
        background-repeat: no-repeat;
        padding: 10px;
        border-radius: 10px;
        width: 100%;
        opacity: .9;
    }

    .imputFuel {
        width: 100%;
        border: none;
        padding: 5px 7px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    #tbConsumo {
        width: 100%;
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        color: black;
        opacity: .9;
    }

    #tbConsumo td {
        border: 1px solid var(--principalCor);
        padding: 2px 5px;

    }

    .trRelatorio {
        font-weight: bold;
        font-size: 20px;
    }

    /* Página senha.php */
    .formSenha {
        width: 60%;
        margin: 0 auto;
        text-align: center;
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        padding: 15px;
        border-radius: 10px;
    }

    .formPass {
        width: 85%;
        margin: 0 auto;
    }

    /* pagina relaorio.php */
    .relat {
        color: black;
        background-color: rgba(240, 248, 255, 0.734);

    }

    .tbRelatorio {
        width: 100%;
        margin-bottom: 15px;
    }

    .tbRelatorio td {
        padding: 2px 5px;
        border: 1px solid rgb(60, 91, 13);
    }

    /* Rodapé na página initial.php */
    footer {
        background-color: var(--secundariaCor);
        position: fixed;
        bottom: 0px;
        width: 100%;
        /* clear: both; */
        margin-top: 10px;
    }

    /* Pagina comentários =============================================================*/
    .listComent {
        width: 80%;
        margin: 30px auto;
        background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
        padding: 15px;
        border-radius: 10px;
        font-size: 18px;
        color: black;
    }

    .pCom {
        border-bottom: 1px solid var(--principalCor);
    }

    /* delCar.php======================================== */
    .hdelcar {
        text-align: center;
    }

    @media(max-width:500px) {
        /* Pagina comentários =============================================================*/

        textarea {
            width: 100%;
        }

        /* Página senha.php */

        .formPass {
            width: 100%;
        }

        .login {
            width: 100%;
            padding: 0px;
        }

        /*página de login*/
        .cabecalho {
            width: 100%;
        }

        #logar input {
            width: 100%;
        }

        body {

            background-image: var(--bgImagem2);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        .user {
            /* background-image: url("https://andersantfer.000webhostapp.com/imgs/carro2.jfif"); */
            background-image: url("../imgs/vertical.jpg");
        }

        .login {
            background-image: url("https://andersantfer.000webhostapp.com/imgs/carro4.jpg");
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            color: aliceblue;
        }

        /*pàgina inicial*/
        .user {
            background-image: url("https://andersantfer.000webhostapp.com/imgs/painel1.jpg");
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            color: aliceblue;
        }

        .btnCarName {
            background-image: linear-gradient(var(--principalCor), var(--secundariaCor));
            width: 350px;
            height: 90px;
            border-radius: 10px;
            border: none;
            opacity: .9;
            font-size: 30px;
            font-weight: bold;
        }

        .colBtns {
            margin-bottom: 30px;
        }

        .btnManutencao {
            width: 95%;
        }

        /*Edição de veículo*/
        .editCar {
            background-image: url("https://andersantfer.000webhostapp.com/imgs/carro5.png");
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            color: aliceblue;
        }



        /*página de login*/
        .login {
            background-image: url("https://andersantfer.000webhostapp.com/imgs/carro1.jpg");
            /* height: 100vh; */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .user {
            background-image: url("https://andersantfer.000webhostapp.com/imgs/carro2.jfif");

            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            color: aliceblue;
        }

        .mduser,
        .icon {
            display: none;
        }


        /*pagina editCar.php*/
        .formEditCar {
            width: 100%;
            margin: 0px;
            background-image: linear-gradient(var(--principalCor), var(--secundariaCor), var(--principalCor));
            border-radius: 15px;
            color: black;
            font-weight: bold;
            padding: 5px;
            text-align: right;
            opacity: .8;
        }

        .formEditCar input {
            width: 60%;
        }


        .rowBtn {
            justify-content: space-around;
        }

        .btnManutencao {
            width: 100%;

        }

        .manutCar {
            width: 100%;
        }

        .row {
            width: 100%;
            margin: 0px;
        }

        .formCadCar {
            width: 100%;
        }

        .showCar {
            padding: 5px 0px;
        }

        /*Consumo*/
        .dateFuel {
            display: none;
        }

        #tbConsumo {
            margin-bottom: 15px;
        }

        /* Relatorio.php */
        .hideTd {
            display: none;
        }

        .formSenha {
            width: 96%;
        }

        /* Initial.php */
        .escolha {
            width: 75%;
            margin: 0 auto;
        }


        #newCar {
            top: 0px;
        }

        #newCar form {
            position: absolute;
            top: 10px;
        }

        /*Edição de veículo*/
        .editCar {
            background-image: url("https://andersantfer.000webhostapp.com/imgs/carro6.jpg");
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            color: aliceblue;

        }

    }
</style>