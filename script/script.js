function showModal() {

    var modal = window.document.getElementById("modal")
    modal.innerHTML = `
    <form class="formCad" action="process.php" method="post">
        <p>Insira um email e senha para se cadastrar</p>
        <input type="hidden" name="action" value="cadastrar">
        <div class="divInput">
            <input type="email" name="email" id="email" placeholder="E-mail">
        </div>
        <div class="divInput">
            <input type="password" name="pass" id="pass" placeholder="Senha" minlength="6" maxlength="12">
        </div>
        <div class="divInput">
            <input type="password" name="confPass" id="confPass" placeholder="Confirma Senha" minlength="6"
                maxlength="12">
        </div>
        <div class="divInput">
            <input type="submit" value="Cadastrar">
        </div>
    </form>
    <button onclick="hideModal()" class="btnInicio" id="cancel">Cancelar</button>
    `
}

function hideModal() {
    var modal = window.document.getElementById("modal")
    modal.innerHTML = ``
    window.alert("Cadástro cancelado")
}

