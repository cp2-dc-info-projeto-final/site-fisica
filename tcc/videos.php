
<!DOCTYPE html>

     

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercicios</title>
  <link rel="stylesheet" type="text/css" href="styleVid.css">   
</head>
<body>
  <div id="D1"> 
    <?php
 
require_once('modelo/tabelausuario.php');
require_once('modelo/tabelaupload.php');



session_start();
  
	

  $ano = null;
  $listaupload = [];

  if (array_key_exists('username', $_SESSION) &&
      array_key_exists('idUsuárioConectado', $_SESSION))
  {
    $id = $_SESSION['idUsuárioConectado'];
    $master = BuscaUsuarioPorId($id);
    $user_name = $_SESSION['username'];
    

    if (array_key_exists('ano', $_REQUEST))
    {
      $ano = filter_var($_REQUEST['ano'], FILTER_VALIDATE_INT);
      $listaupload = ListadeUpload($ano);
    }
  }
  else
  {
    $usuario = null;
    header('Location:login.php');
  }
  
?>
       
      <div class="prof">
     <div class="username"><?php   echo $user_name; ?></div>
          <?php if($master['matricula'] != null){ ?>
             <a class="a"  class = "linkpi" href="cadastroprof.php"> <button id="CadButton" > Fazer o Cadastro </button> </a>
                   <?php } ?> 
      <br>
            <a class="a" href="controlador/sair.php"> <button id="Button" > Sair </button> </a>
      </div>        
    </div>
    
      <ul>
          <li><a class="a"  href="paginInc.php">Home</a></li>
          <li><a class="a" href="formulas.php">Formulas</a></li>
          <li><a class="a" id="a" href="exercicios.php">exercicios</a></li>
          <li><a class="a" href="videos.php">Videos</a></li>
      </ul>


	<div class="box">
		<a class="button" href="?Mecanica">Mecanica</a>
	</div>


	<div class="box">
		<a class="button" href="?Termologia">Termologia</a>
	</div>

			
	<div class="box">
		<a class="button" href="?Onda">Onda</a>
	</div>

			
	<div class="box">
		<a class="button" href="?Eletromagnetismo">Eletromagnetismo</a>
	</div>

			
	<div class="box">
		<a class="button" href="?Óptica">Óptica</a>
	</div>


</body>
<style>
	#iframe {
    display: none;
}
	
</style>
<script>
	
	function exibirIframe()
{
    document.getElementById("iframe").style.display = "block";
}
	function recolherIframe()
{
    document.getElementById("iframe").style.display = "";
}
</script>
</html>

