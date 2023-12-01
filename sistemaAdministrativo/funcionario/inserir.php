<?php
    include '../conexao.php';

    //recebendo dados do formulário
    $codigo = $_REQUEST['codigo'];
    $nome = $_REQUEST['nome'];
    $salario = $_REQUEST['salario'];
    $data_nascimento = $_REQUEST['data_nascimento'];
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];
    $funcao = $_REQUEST['funcao'];

    //Código SQL de inserção no banco de dados
    $sql = "INSERT INTO funcionario (codigo, nome, salario, data_nascimento, cpf, senha, funcao) 
            VALUES ('$codigo', '$nome', '$salario', '$data_nascimento', '$cpf', '$senha', '$funcao')";

    //Executa código SQL ou mostra erro se dar errado
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao Inserir"); 

    //carregar de novo página principal
    header('Location: ../funcionario.php');
?>