<?php
    //Fazer conexão do backend com o banco de dados
    $nomeServidor = "sql301.infinityfree.com"; //localhost
    $username = "if0_35249651"; //root
    $senha = "Ulc2FMFY4KJ"; //""
    $nomeBanco = "if0_35249651_rede_banco"; //rede_banco

    //mysqli - driver responsável por conectar com o banco
    $conexao = new mysqli($nomeServidor, $username, $senha, $nomeBanco);

    //se a conexão falhar - die encerra execução e apresenta mensagem
    if($conexao -> connect_error){
        die("Conexão com o banco de dados falhou!". $conexao -> connect_error);
    }

?>