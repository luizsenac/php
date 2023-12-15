<?php
    include 'conexao.php';

    //recebe cpf e senha do formulario 
    //de login
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    $sql = "SELECT * FROM usuario WHERE cpf = '$cpf'
     AND senha = '$senha' ";

    $resultado = mysqli_query($conexao, $sql);

    //cada valor dos resultados é associado ao nome da coluna no banco
    $linha = mysqli_fetch_assoc($resultado);

    if(mysqli_num_rows($resultado) > 0){
        session_start(); //iniciar a sessão

        //cria variáveis de sessão
        $_SESSION['usuario'] = $linha['nome'];
        $_SESSION['cpf'] = $cpf;
        $_SESSION['senha'] = $senha;

        //manda a pessoa para a página principal
        header('location: principal.php');
    }else{
        //deslogar
        session_unset();
        session_destroy();
        header('location: index.html');
    }

?>