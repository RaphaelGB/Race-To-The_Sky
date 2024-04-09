<?php
    if($_POST){
        include ("../bd/conexao.php");
        include ("../controls/usuario.php");
$nome = $_POST['inputNameCad'];
$username = $_POST['inputUsernameCad'];
$tel = $_POST['inputTelCad'];
$email = $_POST['inputEmailCad'];
$senha = $_POST['inputPassCad'];

    if(inserir($conexao, $nome, $username, $senha, $tel, $email)){
        header("Location: ../login.php");
    } else{
        $msg = mysqli_error($conexao);
        echo ($msg);
    }
}

?>