<?php
include '../conexao.php';

//recebe os names do formulario e armazena em variaveis
$nome = $_REQUEST['nome'];
$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

$sql = "INSERT INTO usuario(nome, cpf, senha)
        VALUES ('$nome', '$cpf', '$senha' ) ";

//executa sql
$resultado = mysqli_query($conexao, $sql);
//manda para a pagina de usuario


session_start();
$_SESSION['mensagem'] = "Cadastrado com sucesso!";
//1 sucesso
//2 erro
$_SESSION['tipo'] = 1;
header('Location:../usuario.php');

?>