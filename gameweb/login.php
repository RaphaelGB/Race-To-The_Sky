<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCadLogin.css">
    <title>Login</title>
</head>
<body>
    <div class="rightSideLogin">
        <div class="up">
            <img id="imgRightSide" src="img/rightLoginImage.png" alt="">
        </div>
        <div class="down">
            <h1 id="fraseRightSide">A sua jornada ao desconhecido começa agora!</h1>
        </div>
    </div>
    <div class="leftSideLogin">
        <form class="formLogin" action="view/usuario_log.php" method="POST">
            <h1 id="fraseLeftSideLogin">Faça Login!</h1>
            <div class="userCampLogin">
                <label for="inputEmail">Email :</label><br>
                <div id="inputEmailExternalLogin">
                    <input id="inputEmail" type="text" placeholder="example@exaample.com" name="inputEmail">
                    <div id="divIcon">
                        <img id="icMail" src="img/mailIcon.png" alt="">
                    </div>
                </div>
                <h6 id="warningEmail">Este campo é obrigatório</h6>
            </div>
            <div class="userCampLogin">
                <label for="inputPassword">Senha :</label><br>
                <div id="inputPassExternalLogin">
                    <input id="inputPassword" type="password" placeholder="Insira sua senha" minlength="8" maxlength="15" name="inputPassword">
                    <img id="openEyeLogin" src="img/OpenEye.png" alt="">
                    <img id="closeEyeLogin" src="img/CloseEye.png" alt="">
                    <div id="divIcon">
                        <img id="icPass" src="img/passIcon.png" alt="">
                    </div>
                </div>
                <h6 id="warningPass">Este campo é obrigatório</h6>
            </div>
            <a href="#" id="forgotPass"><h5>Esqueceu sua senha?</h5></a><br>
            <div class="btnCampLogin">
                <input id="btnSubmitLogin" type="submit" value="Login">
            </div><br>
            <div class="lineGroup">
                <hr id="lineDivisor">
                <h6 id="or">OR</h6>
                <hr id="lineDivisor">
            </div>
            <div class="btnCampLogin">
                <a href="cadastro.php"><button type="button" id="btnCadLogin">Sign up</button></a>
            </div>
        </form>
    </div>
</body>

<script>
const inputEmail = document.getElementById('inputEmail');
const emailPlace = inputEmail.placeholder;
const inputEmailExternalLogin = document.getElementById('inputEmailExternalLogin');
const warningEmail = document.getElementById('warningEmail');
const divIconEmail = inputEmailExternalLogin.querySelector('#divIcon');

const inputPass = document.getElementById('inputPassword');
const inputPassExternalLogin = document.getElementById('inputPassExternalLogin');
const warningPass = document.getElementById('warningPass');
const passPlace = inputPass.placeholder;
const openEye = inputPassExternalLogin.querySelector('#openEyeLogin');
const closeEye = inputPassExternalLogin.querySelector('#closeEyeLogin');
const divIconPass = inputPassExternalLogin.querySelector('#divIcon');

inputEmail.addEventListener('focus', function() {
    this.placeholder = '';
    warningEmail.style.display = "none";
    divIconEmail.style.borderRadius = "0px 5px 5px 0px";
    inputEmailExternalLogin.style.backgroundColor = "#eeeeee";
    inputEmailExternalLogin.style.border = "1px solid transparent";
});

inputEmail.addEventListener('blur', function() {
    var valueEmail = inputEmail.value;
    if(valueEmail === ""){
        warningEmail.style.display = "inline-block";
        divIconEmail.style.borderRadius = "0px 3px 3px 0px";
        inputEmailExternalLogin.style.backgroundColor = "#fd444436";
        inputEmailExternalLogin.style.border = "1px solid #bb0000";
        this.placeholder = emailPlace;
    }
});

inputPass.addEventListener('focus', function() {
    this.placeholder = '';
    if (closeEye.style.display != "inline-block") {
        openEye.style.display = "inline-block";
        this.style.marginRight = "9.6%";
    }
    divIconPass.style.borderRadius = "0px 5px 5px 0px";
    warningPass.style.display = "none";
    inputPassExternalLogin.style.backgroundColor = "#eeeeee";
    inputPassExternalLogin.style.border = "1px solid transparent";
});

document.addEventListener('click', function(event) {
    var elementoAlvo = event.target;
    if (elementoAlvo !== inputPassExternalLogin && !inputPassExternalLogin.contains(elementoAlvo)) {
    var valuePass = inputPass.value;
    var placePass = inputPass.placeholder;
    if(valuePass === "" && placePass === ""){
        warningPass.style.display = "inline-block";
        divIconPass.style.borderRadius = "0px 3px 3px 0px";
        inputPassExternalLogin.style.backgroundColor = "#fd444436";
        inputPassExternalLogin.style.border = "1px solid #bb0000";
        inputPass.placeholder = passPlace;
        inputPass.style.marginRight = "17%";
        closeEye.style.display = "none";
        openEye.style.display = "none";
    }
    }
});

var btn = document.getElementById('btnSubmitLogin');
    btn.addEventListener('click', function(event) {
        var form = document.querySelector('.formLogin');
        if(inputPass.value === ""){
            inputPass.placeholder = passPlace;
            warningPass.style.display = "inline-block";
            divIconPass.style.borderRadius = "0px 3px 3px 0px";
            inputPassExternalLogin.style.backgroundColor = "#fd444436";
            inputPassExternalLogin.style.border = "1px solid #bb0000";
            form.addEventListener('submit', function(event) {
                    event.preventDefault();
            }); 
        }   
        if(inputEmail.value === ""){
            inputEmail.placeholder = emailPlace;
            warningEmail.style.display = "inline-block";
            divIconEmail.style.borderRadius = "0px 3px 3px 0px";
            inputEmailExternalLogin.style.backgroundColor = "#fd444436";
            inputEmailExternalLogin.style.border = "1px solid #bb0000";
            form.addEventListener('submit', function(event) {
                    event.preventDefault();
            }); 
        }   
    });

closeEye.addEventListener('click', function() {
    this.style.display = "none";
    openEye.style.display = "inline-block";
    inputPass.setAttribute('type', 'password');
    inputPass.style.marginRight = "9.6%"
});

openEye.addEventListener('click', function(){
    this.style.display = "none";
    inputPass.setAttribute('type', 'text');
    closeEye.style.display = "inline-block";
});

</script>
</html>