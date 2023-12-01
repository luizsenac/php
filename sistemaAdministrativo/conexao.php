<?php
    $endereco = "localhost";
    $nome = "agenda";
    $usuario = "root";
    $senha = "";

    $conexao = mysqli_connect($endereco, $usuario, $senha, $nome);

   if(!$conexao){
     die("Erro na conexão do Banco:".mysqli_connect_error());
   }

?>