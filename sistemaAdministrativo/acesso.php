<?php
    include 'conexao.php';

    //recebe cpf e senha do index.php
    $cpf = $_REQUEST['cpf'];
    $senha = $_REQUEST['senha'];

    //Seleciona todos usuarios onde cpf="input de cpf" e senha="input de senha"
    $sql = "SELECT * FROM usuario WHERE cpf= '$cpf' AND senha= '$senha' ";

    $resultado = mysqli_query($conexao, $sql);

    //busca uma linha especifica e carrega só esse unico registro, em lista
    $coluna = mysqli_fetch_assoc($resultado);

    //Se o número de registros de resultado na busca for maior que zero
    if(mysqli_num_rows($resultado) > 0){
        //vai logar - criando váriaveís de sessão de acordo com os valores do banco
        session_start();
        $_SESSION['usuario'] = $coluna['nome'];
        $_SESSION['cpf'] = $coluna['cpf'];
        $_SESSION['senha'] = $coluna['senha'];

        //redireciona para pagina principal
        header('location: principal.php');

    }else{
        //não vai logar
        session_unset();            //limpa váriaveis de sesão
        session_destroy();          //destroi sessão
        header('location: index.php');
    }

?>