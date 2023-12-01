<?php
    include '../conexao.php';

    //recebendo dados do formulário
    $nome = $_REQUEST['nome'];
    $senha = $_REQUEST['senha'];
    $cpf = $_REQUEST['cpf'];
    $codigo = $_REQUEST['codigo'];

    //Código SQL de inserção no banco de dados
    $sql = "INSERT INTO usuario (codigo, nome, cpf, senha) 
    VALUES ('$codigo', '$nome', '$cpf', '$senha')";

    //Executa código SQL ou mostra erro se dar errado
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao Inserir"); 

    //carregar de novo página principal
    header('Location: ../principal.php');
?>