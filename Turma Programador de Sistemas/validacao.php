<?php
    session_start();
    //se não estiver logado manda para o login
    //se não existir variável de sessão de cpf ou senha
    if(!isset($_SESSION['cpf']) or !isset($_SESSION['senha'])){

        //destruir sessão e limpar váriaveis de sessão
        session_destroy();
        unset($_SESSION['cpf']);
        unset($_SESSION['senha']);

        //mandar para o login
        header('location:index.html');
    }
?>