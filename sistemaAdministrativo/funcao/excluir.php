<?php
    include '../conexao.php';

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM funcao WHERE funcao.id ='$id' ";

    //executa código sql
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao excluir");

    //direciona para a página principal
    header('Location:../funcao.php');

?>