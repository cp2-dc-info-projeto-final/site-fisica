<?php
 
require_once('modelo/tabelausuario.php');

session_start();

  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {
   
    $user_name = $_SESSION['username'];
    $id = $_SESSION['idUsuárioConectado'];
    $usuario = BuscaUsuarioPorId($id);
    echo $user_name;
  }
  else
  {
    $usuario = null;
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
        
      <div class="prof">
      <br>
     <br>
          <?php if($usuario['matricula'] != null){ ?>
             <a class = "linkpi" href="Cadastro.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?> 
      <br>
            <a href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>				
    </div>
      <ul>
        
        <li><a href="paginInc.php">Home</a></li>
          <li><a href="formulas.php">Formulas</a></li>
          <li><a href="Exercicios.php">Exercicios</a></li>
          <li><a href="videos.php">Videos</a></li>
      </ul>
	
	
</body>
</html>
