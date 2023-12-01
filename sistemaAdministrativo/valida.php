<?php
session_start();
//se não estiver autenticado, manda pro login
//se não existir cpf e senha em variável de sessão
if(!isset($_SESSION['cpf']) and !isset($_SESSION['senha'])){
    session_destroy();              //destroí sessão
    unset($_SESSION['cpf']);        //limpa sessão cpf
    unset($_SESSION['senha']);      //limpa sessão senha
    
    header('location:index.php');   //redireciona para login
}

?>