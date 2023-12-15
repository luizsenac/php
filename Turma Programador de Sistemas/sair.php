<?php
    session_start();
    session_destroy();

    //limpar dados das variáveis de sessão
    unset ($_SESSION['cpf']);
    unset ($_SESSION['senha']);

    //manda para o login
    header('location:index.html');
?>