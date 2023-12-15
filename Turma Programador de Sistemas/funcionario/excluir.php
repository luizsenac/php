<?php
    include '../conexao.php';

    $id = $_REQUEST['id'];
    $sql = "DELETE FROM funcionario WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);
    
    session_start();
    $_SESSION['mensagem'] = "Excluido com sucesso!";
    //1 sucesso
    //2 erro
    $_SESSION['tipo'] = 1;

    header("Location:../funcionario.php");

?>