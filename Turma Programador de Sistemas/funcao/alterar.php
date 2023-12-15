<?php
include '../conexao.php';

//se existir um id
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $descricao = $_REQUEST['descricao'];
    $obs = $_REQUEST['obs'];


    $sql = "UPDATE funcao SET descricao='$descricao', obs='$obs'
        WHERE id='$id' ";

    mysqli_query($conexao, $sql);
    header('Location:../funcao.php');

    session_start();
    $_SESSION['mensagem'] = "Alterado com sucesso!";
    $_SESSION['tipo'] = 1;

} else {
    header('Location:../funcao.php');

    session_start();
    $_SESSION['mensagem'] = "Algo deu errado    !";
    $_SESSION['tipo'] = 3;
}
?>