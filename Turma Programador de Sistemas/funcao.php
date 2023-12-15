<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
  integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php

include 'conexao.php';
include 'validacao.php';


$destino = "./funcao/inserir.php";


//se for diferente de vazio, requisição get codigo
if(!empty($_GET['codigo'])) {
  $id = $_GET['codigo'];
  $sql = "SELECT * FROM funcao WHERE id='$id' ";
  $dados = mysqli_query($conexao, $sql);
  $funcoes = mysqli_fetch_assoc($dados);

  $destino = "./funcao/alterar.php";

  echo '
      <script>
      $(document).ready(function(){
        $("#exampleModal").modal("show");
      });
    </script>
  ';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Usuário </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./recursos/geral.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />



</head>

<body>




  <?php include 'nav.php' ?>

  <div class="container-fluid p-0">

    <div class="row">
      <div class="col-md-3">
        <?php include 'menu.php' ?>
      </div>

      <div class="col-md-9">

        <div class="row">

          <div class="col-md cartao">
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="btn btn-primary " id="cadastrar" data-bs-toggle="modal"
                data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar</button>
            </div>



            <div class="modal fade" data-bs-backdrop='static' id="exampleModal" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <a type="button" class="btn-close" href="funcao.php" aria-label="Close"></a>
                  </div>
                  <div class="modal-body">

                    <h3> <i class="bi bi-person-circle"></i> Cadastro </h3>
                    <form action="<?= $destino; ?>" method="POST">

                      <div class="mb-3">
                        <label>ID: </label>
                        <input name="id" value="<?php echo isset($funcoes) ? $funcoes['id'] : "" ?>" type="text"
                          class="form-control" placeholder="Insira o id">
                      </div>

                      <div class="mb-3">
                        <label>Descricao: </label>
                        <input name="descricao" value="<?php echo isset($funcoes) ? $funcoes['descricao'] : "" ?>" type="text"
                          class="form-control" placeholder="Insira a Descrição">
                      </div>

                      <div class="mb-3">
                        <label>Observação: </label>
                        <input name="obs" value="<?php echo isset($funcoes) ? $funcoes['obs'] : "" ?>" type="text"
                          class="form-control" placeholder="Insira a observação">
                      </div>


                      <button type="submit" class="btn btn-primary">Enviar</button>
                      <button type="reset" class="btn btn-primary">Limpar</button>

                    </form>

                  </div>

                </div>
              </div>
            </div>

            <h3> Listagem </h3>
            <table id="tabela" class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Observação</th>
                  <th scope="col">Opções</th>

                </tr>
              </thead>
              <tbody>

                <?php
                //Selecione todos os funcoes do banco de dados
                $sql = "SELECT * FROM funcao";
                //executa o comando
                $dados = mysqli_query($conexao, $sql);
                //linha vai valer varios registros, que vão ser percorridos
                while($linha = mysqli_fetch_assoc($dados)) {

                  ?>

                  <tr>
                    <th scope="row">
                      <?php echo $linha['id'] ?>
                    </th>
                    <td>
                      <?php echo $linha['descricao'] ?>
                    </td>
                    <td>
                      <?php echo $linha['obs'] ?>
                    </td>
                    
                    <td>
                      <a class="m-3" href="funcao.php?codigo=<?= $linha['id']; ?>"><i
                          class="bi bi-pencil-square"></i></a>
                      <a href="<?php echo "./funcao/excluir.php?id=".$linha['id'] ?>"><i class="bi bi-trash"></i></a>
                    </td>

                     

                  </tr>
                <?php } ?>

              </tbody>
            </table>
            

          </div>
        </div>

      </div>
    </div>

  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="recursos/script.js"></script>


  <?php include 'recursos/alerta.php' ?>



</body>

</html>