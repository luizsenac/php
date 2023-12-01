<?php
    session_start();
    session_destroy(); //destrói a sessão
    unset($_SESSION['cpf']); //limpa variavel de sessão CPF
    unset($_SESSION['senha']); //limpa variavel de sessão senha

    //manda para página de login
    header('location:index.php');

    
?>