<?php
include '../conexao.php';

//recebe os names do formulario e armazena em variaveis
$descricao = $_REQUEST['descricao'];
$obs = $_REQUEST['obs'];


$sql = "INSERT INTO funcao(descricao, obs)
        VALUES ('$descricao', '$obs' ) ";

//executa sql
$resultado = mysqli_query($conexao, $sql);
//manda para a pagina de usuario

session_start();
$_SESSION['mensagem'] = "Cadastrado com sucesso!";
$_SESSION['tipo'] = 1;
header('Location:../funcao.php');

?>