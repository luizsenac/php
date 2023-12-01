<?php
    include '../conexao.php';
    //se existe alguma requisição com id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $codigo = $_REQUEST['codigo'];
        $nome = $_REQUEST['nome'];
        $salario = $_REQUEST['salario'];
        $data_nascimento = $_REQUEST['data_nascimento'];
        $cpf = $_REQUEST['cpf'];
        $senha = $_REQUEST['senha'];
        $funcao = $_REQUEST['funcao'];

        $sql = "UPDATE funcionario SET codigo='$codigo',
         nome='$nome', salario='$salario', data_nascimento ='$data_nascimento',
         cpf='$cpf', senha='$senha', funcao='$funcao' WHERE id='$id' ";

        $resultado = mysqli_query($conexao, $sql);
        //mandar para pagina principal
        header('Location: ../funcionario.php');
    }else{
        header('Location: ../funcionario.php');
    }
    
?>