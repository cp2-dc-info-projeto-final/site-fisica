<?php

require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaassunto.php');

session_start();


	if (array_key_exists('errosCadastrado', $_SESSION))
	{
		$erros = $_SESSION['errosCadastrado'];
		unset($_SESSION['errosCadastrado']);

	}
	else
	{
		$erros = null;
	}


  	if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION) && 
  	   array_key_exists('idassuntos', $_SESSION))
  	{

    	$user_name = $_SESSION['username'];
    	$id = $_SESSION['idUsuárioConectado'];
    	$idassuntos = $_SESSION['idassuntos'];
    	$master = BuscaUsuarioPorId($id);
    	$listaassuntos = ListaAssuntos($id);
  	}
  	else
  	{
    	header('Location:login.php');
  	}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulas</title>
  <link rel="stylesheet" type="text/css" href="styleFor_1.css">
</head>
<body>

<div id="D1">
<div class="logo"><img src="images/hig.jpg" class="escola" ></div>
    
      <div class="prof">
      <br>
     <br>
          <?php if($master['matricula'] != null){ ?>
            <?php echo $user_name; ?>
             <a class = "linkpi" href="cadastroprof.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?>
      <br>
            <a href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>
    </div>
      <ul>
          <li><a class="a"  href="paginInc.php">Home</a></li>
          <li><a class="a" id="a" href="formulas.php">Formulas</a></li>
          <li><a class="a" href="exercicios.php">exercicios</a></li>
          <li><a class="a" href="videos.php">Videos</a></li>
      </ul>
<br>
<br>




		<?php if($master['matricula'] != null){ ?>
			<form name="assuntonovo" method="post" action ="controlador/assuntos.php" >
				<input type="text" name="nome">
				<input type="submit" value="Criar">
			</form>
		<?php } ?>
		<?php foreach ($listaassuntos as $ass) { ?>
			<div class="box">
    			<a href="?ass=<?php$ass['id']?>"><?= $ass['nome']?></a>
    		</div>
    	<?php if ($ass['id']) { ?>	
          
    	<?php } ?>
    	<?php } ?>

		


</body>
</html>
