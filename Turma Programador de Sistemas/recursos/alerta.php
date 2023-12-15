<script src="https://unpkg.com/notie"></script> 
<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
 
 <?php 
    if(isset($_SESSION['mensagem'])){
      echo "<script>
        notie.alert({
          type: ".$_SESSION['tipo'].",
          text: '".$_SESSION['mensagem']."',
        });
      </script>";

      unset ($_SESSION['mensagem']);
      unset ($_SESSION['tipo']);

    }
  ?>