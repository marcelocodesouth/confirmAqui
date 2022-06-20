<?php
include('config.php');

if(isset($_POST['cartao_sus']) || isset($_POST['cpf'])) {

    if(strlen($_POST['cartao_sus']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['cpf']) == 0) {
        echo "Preencha sua senha";
    } else {

        $cartao_sus = $mysqli->real_escape_string($_POST['cartao_sus']);
        $cpf = $mysqli->real_escape_string($_POST['cpf']);

        $sql_code = "SELECT * FROM dados_usuarios WHERE cartao_sus = '$cartao_sus' AND cpf = '$cpf'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: confirma.php");

        } else {
            echo "<br><B><red>ATENÇÃO!</B></red> <br>Não Existem consultas pendentes para o Cartão SUS informado";
        }

    }

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Confirma Agenda v1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
<BR><br><br>


    <div class="container">

<body class="text-center">
  <form class="form-signin" form action="" method="POST">
    <img class="mb-4" src="img/confirma.png" alt="" width="300">
    <h1 class="h3 mb-3 font-weight-normal">Prezado(a) Usuário(a), informe seus dados !</h1>
    <div class="checkbox mb-3">
    
    <label for="cartao_sus" class="sr-only">Cartao SUS:</label>
      <input type="text" name="cartao_sus" class="form-control" placeholder="DIGITE SEU CARTAO SUS " required>

      <label for="cpf" class="sr-only">CPF</label>
      <input type="text" name="cpf" class="form-control" placeholder="DIGITE SEU CPF SEM. E SEM -" required>

    </div>


    <button class="btn btn-lg btn-primary btn-block" type="submit">Validar Dados</button> 

    

    <p class="mt-5 mb-3 text-muted">&copy; Univesp - Céu AZUL DA COR DO MAR - 2022 - V3.1</p>
  </form>

</div></div></div>

</body>



</body>
</html>