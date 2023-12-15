<?php
include '../conexao.php';

//se existir um id
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    $sql = "UPDATE usuario SET nome='$nome', cpf='$cpf', senha='$senha' 
        WHERE id='$id' ";

    mysqli_query($conexao, $sql);
    header('Location:../usuario.php');

    session_start();
    $_SESSION['mensagem'] = "Alterado com sucesso!";
    $_SESSION['tipo'] = 1;

} else {
    header('Location:../usuario.php');

    session_start();
    $_SESSION['mensagem'] = "Algo deu errado    !";
    $_SESSION['tipo'] = 3;
}
?>