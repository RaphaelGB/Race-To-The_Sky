<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCadLogin.css">

    <title>Cadastro</title>
</head>
<body>
    <div class="leftSideCad">
        <form class="formCad" action="view/usuario_cad.php" method="post">
            <h1 id="fraseLeftSideCad">CADASTRO</h1>
            <div class="sides">
                <div class="leftSide-leftSideCad">
                    <div class="userCampCad">
                        <label for="inputNameCad">Nome Completo :</label><br>
                        <div id="inputExternal">
                            <input id="inputCad" type="text" placeholder="Insira seu nome" name="inputNameCad"><br>
                        </div>
                        <h6 id="warning">Este campo é obrigatório</h6>
                    </div>
                    <div class="userCampCad">
                        <label for="inputUsernameCad">Username :</label><br>
                        <div id="inputExternal">
                            <input id="inputCad" type="text" placeholder="Insira um username" name="inputUsernameCad"><br>
                        </div>
                        <h6 id="warning">Este campo é obrigatório</h6>
                    </div>
                    <div class="userCampCad">
                        <label for="inputTelCad">Telefone :</label><br>
                        <div id="inputExternal">
                            <input id="inputCad" type="text" placeholder="(XX) XXXXX-XXXX" oninput="formatarTelefone(this)" maxlength="15" name="inputTelCad"><br>
                        </div>
                        <h6 id="warning">Este campo é obrigatório</h6>
                    </div>
                </div>
                <div class="rightSide-rightSideCad">
                    <div class="userCampCad">
                        <label for="inputEmailCad">Email :</label><br>
                        <div id="inputExternal">
                            <input id="inputCad" type="text" placeholder="info@xyz.com" name="inputEmailCad"><br>
                        </div>
                        <h6 id="warning">Este campo é obrigatório</h6>
                    </div>
                    <div class="userCampCad">
                        <label for="inputPassCad">Crie uma senha :</label><br>
                        <div id="inputExternal" class="outroid">
                            <input id="inputCad" type="password" placeholder="Insira sua senha" minlength="8" maxlength="15" name="inputPassCad"><br>
                            <img id="openEyeCad" src="img/OpenEye.png" alt="">
                            <img id="closeEyeCad" src="img/CloseEye.png" alt="">
                        </div>
                        <h6 id="warning" class="warningPass">Este campo é obrigatório</h6>
                    </div>
                    <div class="userCampCad">
                        <label for="inputPassConfirmCad">Repita a senha :</label><br>
                        <div id="inputExternal">
                            <input id="inputCad" type="password" placeholder="Insira sua senha novamente" minlength="8" maxlength="15" name="inputPassConfirmCad"><br>
                        </div>
                        <h6 id="warning">Este campo é obrigatório</h6>
                    </div>
                </div>
            </div>
            <a style="outline:none" href="login.php"><h5 id="alreadyCad">Já possui cadastro?</h5></a>
            <div class="btnCampCad">
                <input id="btnSubmitCad" type="submit" value="Sign up">
            </div>
        </form>
    </div>
    <div class="rightSideCad">
        <div class="up">
            <img id="imgRightSide" src="img/rightLoginImage.png" alt="">
        </div>
        <div class="down">
            <h1 id="fraseRightSide">A sua jornada ao desconhecido começa agora!</h1>
        </div>
    </div>

<script>

//const inputExternal = document.querySelectorAll('#inputExternal');

const openEye = document.getElementById('openEyeCad');
const closeEye = document.getElementById('closeEyeCad');
const inputPass = document.getElementsByName('inputPassCad')[0];
const inputPassExternal = document.querySelector('.outroid');
const warningPass = document.querySelector('.warningPass');
const placeholderPass = inputPass.placeholder;
const inputConfirm = document.getElementsByName('inputPassConfirmCad')[0];
const form = document.querySelector('.formCad');

document.addEventListener('DOMContentLoaded', function() {

var inputs = document.querySelectorAll('#inputCad');
var placeholder = "";

var btn = document.getElementById('btnSubmitCad');
btn.addEventListener('click', function(event){
    if(inputPass.value !== inputConfirm.value){
            alert("As senhas devem ser iguais");
            form.addEventListener('submit', function(event) {
                    event.preventDefault();
                });
                }
    });
      

inputs.forEach(function(input){
    

    closeEye.addEventListener('click', function() {
        this.style.display = "none";
        openEye.style.display = "inline-block";
        inputPass.setAttribute('type', 'password');
    });

    openEye.addEventListener('click', function(){
        this.style.display = "none";
        closeEye.style.display = "inline-block";
        inputPass.setAttribute('type', 'text');
        inputPass.style.width = "82%";
    });

    input.addEventListener('focus', function() { 
        var inputExternal = this.parentNode;
        var passDiferencial = this.getAttribute('name');
        if (passDiferencial === "inputPassCad"){
            inputPassExternal.style.justifyContent = "end";
            if (closeEye.style.display != "inline-block") {
                openEye.style.display = "inline-block";
                this.style.width = "82%";
            }
        }
        
        placeholder = this.placeholder;
        this.placeholder = '';
        
        var userCampCad = inputExternal.parentNode;
        var warning = userCampCad.querySelector('#warning');

        warning.style.display = "none";

        inputExternal.style.backgroundColor = "#eeeeee";
        inputExternal.style.border = "1px solid transparent";
    });
    
    input.addEventListener('blur', function() {
        var passDiferencial = this.getAttribute('name');
        if (passDiferencial != "inputPassCad"){
        if(this.value === ""){
            this.placeholder = placeholder;
            var inputExternal = this.parentNode;
            var userCampCad = inputExternal.parentNode;
            var warning = userCampCad.querySelector('#warning');
            warning.style.display = "inline-block";
            inputExternal.style.backgroundColor = "#fd444436";
            inputExternal.style.border = "1px solid #bb0000";
        }
    }
    });


    var btn = document.getElementById('btnSubmitCad');
    btn.addEventListener('click', function(event) {
        
        
        if(input.value === ""){
            var placeholder = input.placeholder;
            input.placeholder = placeholder;
            var inputExternal = input.parentNode;
            var userCampCad = inputExternal.parentNode;
            var warning = userCampCad.querySelector('#warning');

            warning.style.display = "inline-block";
            inputExternal.style.backgroundColor = "#fd444436";
            inputExternal.style.border = "1px solid #bb0000";

            form.addEventListener('submit', function(event) {
                    event.preventDefault();
            }); 
        }   
    });
    
});

document.addEventListener('click', function(event) {
    var elementoAlvo = event.target;
    if (elementoAlvo !== inputPassExternal && !inputPassExternal.contains(elementoAlvo)) {
    var valuePass = inputPass.value;
    var placePass = inputPass.placeholder;
    if(valuePass === "" && placePass === ""){
        warningPass.style.display = "inline-block";
        inputPassExternal.style.backgroundColor = "#fd444436";
        inputPassExternal.style.border = "1px solid #bb0000";
        inputPass.placeholder = placeholderPass;
        closeEye.style.display = "none";
        openEye.style.display = "none";
        inputPass.style.width = "90%";
        inputPassExternal.style.justifyContent = "center";
    }
    }
});
});


function formatarTelefone(telefone) {
  const teclaBackspace = 8;

  // Verifica se a tecla "backspace" foi pressionada
  if (event.keyCode !== teclaBackspace) {
    // Remove todos os caracteres não numéricos
    let valor = telefone.value.replace(/\D/g, "");

    // Verifica se o último caractere a ser removido é um espaço em branco
    const ultimoCaractere = telefone.value.slice(-1);
    if (ultimoCaractere === " " || ultimoCaractere === "-" || ultimoCaractere === "(" || ultimoCaractere === ")") {
      valor = valor.substring(0, valor.length - 1); // Remove o espaço em branco
    }

    // Formatação para DDD entre parênteses, espaço após o DDD e hífen após o sétimo dígito
    if (valor.length > 0) {
      valor = "(" + valor;
    }

    if (valor.length > 2) {
      valor = valor.substring(0, 3) + ") " + valor.substring(3);
    }

    if (valor.length > 9) {
      valor = valor.substring(0, 10) + "-" + valor.substring(10);
    }

    // Limita o tamanho máximo da entrada para 14 caracteres
    valor = valor.substring(0, 15);

    telefone.value = valor;
  }
}
</script>

</body>
</html>