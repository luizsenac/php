<?php
    include '../conexao.php';
    //se existe alguma requisição com id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $descricao = $_REQUEST['descricao'];
        $obs = $_REQUEST['obs'];

        $sql = "UPDATE funcao SET descricao='$descricao',
         obs='$obs' WHERE id='$id' ";

        $resultado = mysqli_query($conexao, $sql);
        //mandar para pagina principal
        header('Location: ../funcao.php');
    }else{
        header('Location: ../funcao.php');
    }
    
?>