<?php
    include '../conexao.php';

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM usuario WHERE usuario.id ='$id' ";

    //executa código sql
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao excluir");

    //direciona para a página principal
    header('Location:../principal.php');

?>