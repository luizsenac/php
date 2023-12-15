<?php
    include 'conexao.php'; //conexão com o banco de dados
    //include 'valida.php';  //verifica se a pessoa está logada

    session_start();
    $cpf =  $_SESSION['cpfFuncionario'];

    $eventos = array();
    $sql = "SELECT agenda.id AS id,
    funcionario.nome AS funcionario,
    curso, data, hora_inicio, hora_fim
    FROM agenda INNER JOIN funcionario 
    ON funcionario.id = agenda.funcionario WHERE funcionario.cpf = '$cpf' ";

    $resultado = $conexao->query($sql);

    //se o resultado tiver um numero de linhas maior que zero
    if($resultado->num_rows > 0){
        
        //looping enquanto tiver registros no banco
        while ($linha = $resultado->fetch_assoc()){
            //alimentar lista de eventos, com os dados do banco
            $eventos[] = array(
                'id' => $linha['id'],
                'title' => $linha['curso'],
                'start' => $linha['data'].'T'.$linha['hora_inicio'],
                'end' => $linha['data'].'T'.$linha['hora_fim'],
            );
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Calendário </title>
    <link rel="stylesheet" href="recursos/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />


</head>

<body>
    <!-- Importa a barra superior -->
    <?php include('nav.php'); ?>


    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 menu animate__animated animate__fadeInLeft">
                <?php include 'menu.php'; ?>
            </div>

            <div class="col-md-9">
                
                <div>
                    <label>Escolha sua visualização:</label>
                    <select class="form-control" id="visualizacao">

                        <option value="dayGridMonth"> Mês </option>
                        <option value="timeGridWeek"> Semana </option>
                        <option value="timeGridDay"> Dia </option>
                        <option value="listWeek"> lista </option>

                        

                    </select>
                    <div id="calendar" style="max-width:100vh;"></div>

                </div>

          

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="recursos/script.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: <?php echo json_encode($eventos); ?>

        });
        calendar.render();

        var visualizacao = document.getElementById('visualizacao');
        visualizacao.addEventListener("change", function(){ calendar.changeView(visualizacao.value); });



      });

    </script>
</body>

</html>