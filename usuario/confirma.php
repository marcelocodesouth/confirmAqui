
<?php
include('config.php');

$sql = "SELECT * FROM dados_usuarios";
$result = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");



?>






<!doctype html>
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
<BR><BR>


    <div class="container">

  <body class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="img/confirma.png" alt="" width="300">
      <h1 class="h4 mb-3 font-weight-normal">Verifique seus dados e confirme sua consulta</h1>
       
<?php
	while($row = mysqli_fetch_array($result)){
  echo "<HR> <Br>";
  echo "<b> Sr(a): </b> {$row['nome']} <Br>";
  echo "<b> Consulta agendada com: </b> {$row['especialidade']} <Br>";
  echo "<b> Dia: </b> {$row['data_consulta']}"; 
  echo "<b> Ás: </b> {$row['horario']} <Br>";
  echo "<b> Na unidade: </b> {$row['unidade']} <Br>";
	}
?>

<!--
  echo "<b> E-mail: </b> {$row['email']} <Br>";
  echo "<b> CPF: </b> {$row['cpf']} <Br>";
  echo "<b> RG: </b> {$row['rg']} <Br>";
  echo "<b> Cartão SUS: </b> {$row['cartao_sus']} <Br>";
-->



      <!-- OS DADOS DESTA PAGINA DEVEM VIR PREENCHIDOS POIS JA FORAM ADICIONADOS MA PAGINA DE CADASTRO -->


      <BR><BR>
      <div id="liveAlertPlaceholder"></div>
      <button type="button" class="btn btn-primary" id="liveAlertBtn">Confirmar Agendamento</button><BR>

<form>
<br><input type="button" class="btn btn-primary"  name="btn-sair" value="Sair" onclick="javascript:window.close()">
</form

      <BR><BR><p class="mt-5 mb-3 text-muted">&copy; Univesp - Céu AZUL DA COR DO MAR - 2022 - V3.1</p>
    </form>

</div>





<script>

var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
var alertTrigger = document.getElementById('liveAlertBtn')

function alert(message, type) {
  var wrapper = document.createElement('div')
  wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

  alertPlaceholder.append(wrapper)
}

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    alert('Prezado(a), Sua consulta foi confirmada com sucesso !', 'success')
  })
}



</script>


  </body>
</html>



