<?php
include 'conexao.php';
include 'validacao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Login </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./recursos/geral.css">

</head>

<body>

  <?php include 'nav.php' ?>

  <div class="container-fluid p-0">

    <div class="row">
      <div class="col-md-3">
        <?php include 'menu.php' ?>
      </div>

      <div class="col-md-9">

        <div class="row" style="text-align:center;" >
          <div class="col-md cartao">
            <h3>Bem vindo
              <?php echo $_SESSION['usuario']; ?> 😁

            </h3>

          </div>
          <div class="col-md cartao"> 
            Informações:
            <br>
            <p> Construção do Sistema de Recursos Humanos feito
            no curso Programador de sistemas do Senac </p>


          </div>

         

        </div>

      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="recursos/script.js"></script>

 

  
</body>

</html>