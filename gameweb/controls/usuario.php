<?php
function inserir ($conexao,$nome, $username, $senha, $tel, $email){
    $sql = "insert into TB_USUARIO (
        TB_USUARIO_NOME,
        TB_USUARIO_USERNAME,
        TB_USUARIO_SENHA,
        TB_USUARIO_TELEFONE,
        TB_USUARIO_EMAIL
        ) values
        (
        '$nome',
        '$username',
        $senha,
        '$tel',
        '$email'
        );";
        return mysqli_query($conexao,$sql);
};

function buscar ($conexao, $email, $senha){
    $sql = "select * 
    from TB_USUARIO 
    where TB_USUARIO_EMAIL = '$email'
    and TB_USUARIO_SENHA = $senha;";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}

function alterar_usuario($conexao, $id, $nome){
    $sql = "Update tb_usuario 
    SET TB_USUARIO_NOME = '$nome' 
    WHERE TB_USUARIO_ID = 1;";
    $command = mysqli_query($conexao, $sql);
    return $command;
}


function deletar_usuario ($conexao, $id){
    $sql = "delete from TB_USUARIO where TB_USUARIO_ID = $id";
    $command = mysqli_query($conexao, $sql);
    return $command;
}

function listar_usuario($conexao){
    $usuarios = array();
    $sql = "select * from TB_USUARIO";
   $resultado = mysqli_query($conexao, $sql);
    while ($usuario = mysqli_fetch_assoc($resultado)){
        array_push($usuarios,$usuario);
    }
    return $usuarios;
}

function verificaAmbiguidade($conexao, $tel, $email, $user){

    $sql_tel = "select * from tb_usuario where tb_usuario_telefone='{$tel}'";

    $resultado_tel = mysqli_query($conexao, $sql_tel);

    $sql_email = "select * from tb_usuario where tb_usuario_email='{$email}'";

    $resultado_email = mysqli_query($conexao, $sql_email);

    $sql_user = "select * from tb_usuario where tb_usuario_username='{$user}'";

    $resultado_user = mysqli_query($conexao, $sql_user);

        if (mysqli_num_rows($resultado_user)>=1) {
            echo ("teste");
            echo "<script> alert('Já estão usando este username, por favor escolha outro!') </script>";
                header("Location: ../cadastro.php");
            return die;

        }else if (mysqli_num_rows($resultado_tel)>=1) {

            echo "<script>alert('Já estão usando este username, por favor escolha outro!')</script>";

            return die;

        }else if (mysqli_num_rows($resultado_email)>=1) {

            echo "<script>alert('Já estão usando este username, por favor escolha outro!')</script>";

            return die;

        }

}
/*
VERIFICA VINDO O GAMEWEB2
function verifica_email($conexao,$email){
    $sql = "select * 
    from tb_usuario 
    where tb_usuario_email = '$email'";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);  
}

function verifica_tel($conexao,$tel){
    $sql = "select * 
    from tb_usuario 
    where tb_usuario_telefone = '$tel'";
    $resultado = mysqli_query($conexao, $sql);
    return(mysqli_fetch_assoc($resultado));
    
}

function verifica_username($conexao,$username){
    $sql = "select * 
    from tb_usuario 
    where tb_usuario_username = '$username'";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);  
}*/

?>