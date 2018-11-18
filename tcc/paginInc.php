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


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylePaginInc.css">
  <title>higino0910</title>

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
          <li><a href="#Videos">Videos</a></li>
         
        </ul>
	  
          <div class="Slides">

      <slider>
          <slide><p></p></slide>
          <slide><p></p></slide>
          <slide><p></p></slide>
          <slide><p></p></slide>
      </slider>
    </div>

    <div id="D2">
        
    </div>

    <div id="D3">
        
    </div>

  <div id="D4">
     
  </div>

  <div id="D5">
      
  </div>

  <div id="D6">
     
  </div>

  <div id="D7">
      
  </div>

  <div id="D8">
      <p></p>
  </div>

</body>
</html>
