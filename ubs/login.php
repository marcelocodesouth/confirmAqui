<?php
include('config.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: cadastronovo.php");

        } else {
            echo "<br><B>Acesso Negado!</B> <br>Usuário ou Senha Inválidos";
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


    <title> Confirmaqui - Sistema de Confirmação de Consultas - V3.1</title>

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
    <h1 class="h3 mb-3 font-weight-normal">Faça login com seu nome de usuário	</h1>
    <div class="checkbox mb-3">
    
    <label for="email" class="sr-only">USUÁRIO:</label>
      <input type="text" name="email" class="form-control" placeholder="USUARIO " required>

      <label for="senha" class="sr-only">SENHA</label>
      <input type="password" name="senha" class="form-control" placeholder="SENHA" required>

    </div>


    <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button> 

		<BR>Sem cadastro? <a href="../cadastro/index.html"> Criar usuário </a>
		<BR><a href="#">Esqueceu sua senha </a> ou <a href="#">nome de usuário ? </a></a>

    <p class="mt-5 mb-3 text-muted">© Univesp - Céu AZUL DA COR DO MAR - 2022 - V3.1</p>
  </form>

</div></div></div>

</body>



</body>
</html>