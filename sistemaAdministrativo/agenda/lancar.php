<?php
include '../conexao.php';

//recebendo dados do formulário
$data_inicio = new DateTime($_REQUEST['data_inicio']);
$data_fim = new DateTime($_REQUEST['data_fim']);
$dias_semana =  $_REQUEST['dias_semana'];

$hora_inicio = $_REQUEST['hora_inicio'];
$hora_fim = $_REQUEST['hora_fim'];
$curso = $_REQUEST['curso'];
$codigo = $_REQUEST['codigo'];
$obs = $_REQUEST['obs'];
$funcionario = $_REQUEST['funcionario'];

$data_atual = $data_inicio;
//enquanto a data atual for menor que a data de término
while ($data_atual <= $data_fim) {
    //formatar data para ano mês e dia
    $data = $data_atual->format('Y-m-d');
    //strtolower converte em minusculo
    //date('l') pega o dia da semana escrito(monday, friday...)
    //strtotime converte em timestamp, ou seja, data semana hora juntos
    $dia_semana = strtolower(date('l', strtotime($data)));

    //se o dia da semana de acordo com o periodo, está nas marcações do checkbox da tela ex: segunda()
    if (in_array($dia_semana, $dias_semana)) {
        $sql = "INSERT INTO agenda 
            (data, hora_inicio, hora_fim, curso,codigo, obs, funcionario)
            VALUES 
            ('$data', '$hora_inicio','$hora_fim','$curso','$codigo','$obs','$funcionario')";

        $resultado = mysqli_query($conexao, $sql) or die("Erro ao Inserir");
    }
    //avança um dia a frente
    $data_atual->add(new DateInterval('P1D'));
}

header('Location: ../agenda.php');
