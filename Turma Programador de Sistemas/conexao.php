<?php
   $endereco = "localhost";
   $nome = "bancorh";
   $usuario = "root";
   $senha = "";

   $conexao = mysqli_connect($endereco, $usuario, $senha, $nome);

   //Se não possuir conexão
   if(!$conexao){
        die("Erro na conexão com o Banco: ".mysqli_connect_error());
   }
   
?>