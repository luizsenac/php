<?php
    include '../conexao.php';
    //se existe alguma requisição com id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $data = $_REQUEST['data'];
        $hora_inicio = $_REQUEST['hora_inicio'];
        $hora_fim = $_REQUEST['hora_fim'];
        $curso = $_REQUEST['curso'];
        $codigo = $_REQUEST['codigo'];
        $obs = $_REQUEST['obs'];
        $funcionario = $_REQUEST['funcionario'];

        $sql = "UPDATE agenda SET data='$data', hora_inicio='$hora_inicio', hora_fim='$hora_fim',
         curso='$curso', codigo='$codigo', obs='$obs', funcionario='$funcionario' WHERE id='$id' ";

        $resultado = mysqli_query($conexao, $sql);
        //mandar para pagina principal
        header('Location: ../agenda.php');
    }else{
        header('Location: ../agenda.php');
    }
    
?>