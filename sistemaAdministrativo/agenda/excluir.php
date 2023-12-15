<?php
    include '../conexao.php';

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM agenda WHERE agenda.id ='$id' ";

    //executa código sql
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao excluir");

    //direciona para a página principal
    header('Location:../agenda.php');
    
?>