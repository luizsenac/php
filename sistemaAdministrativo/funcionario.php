<?php
    include 'conexao.php'; //conexão com o banco de dados
    include 'valida.php';  //verifica se a pessoa está logada

    $destino = "./funcionario/inserir.php";

    //se for diferente de vazio, ao receber um código de alteração
    if(!empty($_GET['alteracao'])){
        $id = $_GET['alteracao'];
        
        //selecionar o registro que tem o id, que foi escolhi para alterar
        $sql = "SELECT * FROM funcionario WHERE id='$id' ";
        $dados = mysqli_query($conexao, $sql);  //executa código sql
        $funcionarios = mysqli_fetch_assoc($dados); //var tem registros separados em colunas

        $destino = "./funcionario/alterar.php";
    }
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Página Principal </title>
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
                <div class="row">
                    <div class="col-md cartao">

                        <h1> Cadastro </h1>

                        <form action="<?=$destino; ?>" method="POST">

                            <div class="form-group">
                                <label> Id </label>
                                <input name="id" type="text" value="<?php echo isset($funcionarios) ? $funcionarios['id'] : "" ?>" class="form-control" placeholder="Id">
                            </div>

                            <div class="form-group">
                                <label> Codigo </label>
                                <input name="codigo" type="text" value="<?php echo isset($funcionarios) ? $funcionarios['codigo']:"" ?>" class="form-control" placeholder="Seu código">
                            </div>

                            <div class="form-group">
                                <label> Nome </label>
                                <input name="nome" type="text" value="<?php echo isset($funcionarios) ? $funcionarios['nome']:"" ?>" class="form-control" placeholder="Seu nome">
                            </div>

                            <div class="form-group">
                                <label> Salario </label>
                                <input name="salario" type="text" 
                                value="<?php echo isset($funcionarios) ? $funcionarios['salario'] : "" ?>" class="form-control" placeholder=" Seu salário">
                            </div>

                            <div class="form-group">
                                <label> Data de Nascimento </label>
                                <input name="data_nascimento" type="text" 
                                value="<?php echo isset($funcionarios) ? $funcionarios['data_nascimento']:"" ?>" class="form-control" placeholder="Sua data de nascimento">
                            </div>

                            <div class="form-group">
                                <label> CPF </label>
                                <input name="cpf" type="text" value="<?php echo isset($funcionarios) ? $funcionarios['cpf']:"" ?>" class="form-control" placeholder="Seu CPF">
                            </div>

                            <div class="form-group">
                                <label> Senha </label>
                                <input name="senha" type="text" 
                                value="<?php echo isset($funcionarios) ? $funcionarios['senha']:"" ?>" class="form-control" placeholder="Sua senha">
                            </div>

                            <div class="form-group">
                                <label> Profissão </label>

                                <select name="funcao" class="form-control"> 
                                    <option value=""> Selecione </option>

                                    <?php
                                        $sql = "SELECT * FROM funcao";
                                        $dados = mysqli_query($conexao, $sql);

                                        while($linha = mysqli_fetch_assoc($dados)){
                                            echo "<option value='".$linha['id']."' >".$linha['descricao']."</option>";
                                        }
                                    
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar <i class="fa-solid fa-plus"></i> </button>
                        </form>
                    </div>
                    <div class="col-md cartao">
                        <h1> Listagem </h1>

                        <table class="table" id="tabela">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome </th>
                                    <th scope="col">CPF </th>
                                    <th scope="col">Alterar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM funcionario";
                                    $resultado = mysqli_query($conexao, $sql);
                                    while ($coluna = mysqli_fetch_assoc($resultado)) {
                                    
                                ?>
                                <tr>
                                    <th scope="row"> <?php echo $coluna['id']; ?> </th>
                                    <td> <?php echo $coluna['nome']; ?> </td>
                                    <td> <?php echo $coluna['cpf']; ?> </td>
                                    <td> <a href="funcionario.php?alteracao=<?= $coluna['id'] ?>"> <i class="fa-solid fa-pen-to-square"></i> </a> </td>
                                    <td> <a href="<?php echo "./funcionario/excluir.php?id=".$coluna['id'];  ?>" > <i class="fa-solid fa-trash"></i> </a> </td>
                                </tr>
                                
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
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
</body>

</html>