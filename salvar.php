<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando Postagem</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="painel">

        <div class="cabecalho">
            <h1> Senac Connect </h1>
        </div>

        <div class="conteudo"> 
            <h2> Postagem efetuada com Sucesso!</h2>

            <?php
                //$usuario = "Gael";
                //criação de cookie
                //nome do cookie + valor + dataExpiração + onde pode acessar("/"Qualquer lugar)
                //setcookie("nome", $usuario, time() + 86400 * 30, "/");
                $usuario = $_COOKIE["nome"];
                
                //verifica se a requisição foi feita usando POST
                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    //obtém o conteúdo da postagem do campo "postagem"
                    $postagem = $_POST["postagem"];

                    echo "$usuario postou: $postagem";

                    //região abaixo é para criar uma lista de sessão
                    session_start(); //iniciar sessão para usar variáveis de sessão
                    
                    //Se a lista de postagens não(!) existe(isset)
                    if(!isset($_SESSION["postagens"])){

                        //cria uma lista vazia de sessão, só a 1º vez
                        $_SESSION["postagens"] = array();
                    }
                    //adiciona postagem a lista de postagens
                    array_push($_SESSION["postagens"], $postagem);

                }


            ?>

        </div>
        
        <div class="rodape"> 
            <a href="index.html" class="botao"> Fazer Nova Postagem </a>
            <a href="cookie.html" class="botao"> Cadastrar Usuario </a>
            <a href="busca.html" class="botao"  >   Buscar        </a>
            <a href="lista.php" class="botao"> Lista de Posts  </a>
        </div>

    </div>
    
</body>
</html>