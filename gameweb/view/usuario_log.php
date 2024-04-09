<?php

if($_POST){

include("../controls/usuario.php");
include("../bd/conexao.php");

$email = $_POST['inputEmail'];
$senha = $_POST['inputPassword'];
$dados = buscar($conexao, $email, $senha);

if(isset($dados)){
    session_start();
    $_SESSION['username'] = $dados['TB_USUARIO_USERNAME'];
    $_SESSION['id'] = $dados['TB_USUARIO_ID'];
    $_SESSION['active'] = "ativo"; 
    header("Location: ../index.php");
    die();
} else{
    echo("Usuário não encontrado");
}}
?>