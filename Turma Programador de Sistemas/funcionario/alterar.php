<?php
include '../conexao.php';

//se existir um id
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $salario = $_REQUEST['salario'];
    $data_nascimento = $_REQUEST['data_nascimento'];
    $funcao = $_REQUEST['funcao'];
   
    $sql = "UPDATE funcionario SET nome='$nome', cpf='$cpf', salario='$salario',
         data_nascimento='$data_nascimento', funcao='$funcao'
        WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);
    header('Location:../funcionario.php');

    session_start();
    $_SESSION['mensagem'] = "Alterado com sucesso!";
    $_SESSION['tipo'] = 1;

} else {
    header('Location:../usuario.php');

    session_start();
    $_SESSION['mensagem'] = "Algo deu errado    !";
    $_SESSION['tipo'] = 3;
}
?>