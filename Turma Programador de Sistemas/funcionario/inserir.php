<?php
include '../conexao.php';

//recebe os names do formulario e armazena em variaveis
$nome = $_REQUEST['nome'];
$cpf = $_REQUEST['cpf'];
$salario = $_REQUEST['salario'];
$data_nascimento = $_REQUEST['data_nascimento'];
$funcao = $_REQUEST['funcao'];

$sql = "INSERT INTO funcionario(nome, cpf, salario, data_nascimento, funcao)
        VALUES ('$nome', '$cpf', '$salario', '$data_nascimento', '$funcao' ) ";

//executa sql
$resultado = mysqli_query($conexao, $sql);
//manda para a pagina de usuario

session_start();
$_SESSION['mensagem'] = "Cadastrado com sucesso!";
//1 sucesso
//2 erro
$_SESSION['tipo'] = 1;
header('Location:../funcionario.php');

?>