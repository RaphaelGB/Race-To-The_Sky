<?php


function inserir_comentario ($conexao,$desc, $title, $estrelas, $id_user){
    $sql = "insert into TB_COMENTARIO (
        TB_COMENTARIO_DESCRICAO,
        TB_COMENTARIO_TITLE,
        TB_COMENTARIO_ESTRELAS,
        TB_USUARIO_ID
        ) values
        (
        '$desc',
        '$title',
        '$estrelas',
        $id_user
        );";
        return mysqli_query($conexao,$sql);
};

function buscar_avaliacao($conexao, $id){
    $sql =     
    "
    Select C.TB_COMENTARIO_ID as ID, 
    C.TB_COMENTARIO_TITLE as Title,
     C.TB_COMENTARIO_DESCRICAO as Descric, 
     C.TB_COMENTARIO_ESTRELAS as Estr,
     U.TB_USUARIO_NOME as nome
    from TB_COMENTARIO as C
    inner join TB_USUARIO as U
    on U.TB_USUARIO_ID = C.TB_USUARIO_ID
    Where C.TB_COMENTARIO_ID = $id";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);   
}

function quant_comentario($conexao){
    $sql = "select count(TB_COMENTARIO.TB_COMENTARIO_ID) as QUANT from TB_COMENTARIO;";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);
}
function buscar_comentario ($conexao, $id){
    $sql = "select *
    from TB_COMENTARIO
    where TB_COMENTARIO_ID = $id;";
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);   
}

function alterar_comentario($conexao, $desc, $id ){
    $sql = "Update TB_COMENTARIO
    SET TB_COMENTARIO_TITLE = '$desc'
    where TB_COMENTARIO_ID = $id;";
    $command = mysqli_query($conexao, $sql);
    return $command;
}


function deletar_comentario ($conexao, $id){
    $sql = "delete from TB_COMENTARIO where TB_COMENTARIO_ID = $id";
    $command = mysqli_query($conexao, $sql);
    return $command;
}

function listar_comentario($conexao){
    $usuarios = array();
    $sql = "select * from TB_COMENTARIO";
    $resultado = mysqli_query($conexao, $sql);
    while ($comentario = mysqli_fetch_assoc($resultado)){
        array_push($comentarios,$comentario);
    }
    return $comentarios;
}
?>