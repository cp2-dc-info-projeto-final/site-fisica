<?php
 
require_once('modelo/tabelausuario.php');

session_start();

  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {
   
    $user_name = $_SESSION['username'];
    echo $user_name;

    $id = $_SESSION['idUsuárioConectado'];
    $usuario = BuscaUsuarioPorId($id);
  }
  else
  {
    header('Location:login.php');
  }
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>exercicios</title>
<link rel="stylesheet" type="text/css" href="styleExer.css">

  

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
        	 <li><a href="paginInc.php">Pagina Inicial</a></li>
          <li><a href="formulas.php">Formulas</a></li>
          <li><a href="Exercicios.php">Exercicios</a></li>
          <li><a href="#Videos">Videos</a></li>        </ul>s

    <a href="AssuntosF/mecanica.php">Mecânica</a>
    <a href="AssuntosF/Termologia.php">Termologia</a>
    <a href="AssuntosF/Onda.php">Onda</a>
    <a href="AssuntosF/Eletromagnetismo.php">Eletromagnetismo</a>
    <a href="AssuntosF/Óptica.php">Óptica</a>

</select>	
</body>
</html>
