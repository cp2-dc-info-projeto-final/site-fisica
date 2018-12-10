<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vídeos</title>
  <link rel="stylesheet" type="text/css" href="styleFor_1.css">   
</head>
<body>
  <div id="D1"> 
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
    header('Location:loginAluno.php');
  }
?>
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
        <li><a href="exercicios.php">Exercicios</a></li>
        <li><a href="videos.php">Videos</a></li>
      </ul>

<div id="iframe1">

<iframe width="900" height="450" src="https://www.youtube.com/embed/WRcs8rebZtA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</div>
</body> 

<style>
    #iframe1{
        position: fixed;
        top: 300px; 
        margin-left: 30%;
        }
</style>

</html>
