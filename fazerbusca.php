
<?php
    echo "teste";
    session_start();

    //se tem alguma busca digitada
    if(isset($_GET["busca"])){
        //armazena na varíavel conteudo o valor de input
        $conteudo = $_GET["busca"];

        //se tiver itens postagens
        if(isset($_SESSION["postagens"])){
            echo "<ul>";
            foreach($_SESSION["postagens"] as $postagem){
                if(stripos($postagem, $conteudo) !== false){
                    echo "<li> $postagem </li>";
                }
            }
            echo "</ul>";
        }

    }

?>