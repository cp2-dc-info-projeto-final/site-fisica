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
		<div class="box">
		<a class="button" href="#popup1">Mecanica</a>
	</div>

			<div id="popup1" class="overlay">
				<div class="popup">
					<h2>Mecanica</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
					   <a href="images/mecanica/2%20lei%20de%20newton.pdf.pdf">Lei de Newton</a>
                       <a href="images/mecanica/Histro.pdf">Pressao e Empuxo</a>    
                       <a href="images/mecanica/img_5878.pdf">Força elastica, centripeta, trabalho e potencia</a>   
                       <a href="images/mecanica/equaes-e-formulas-da-fsica-1-638.pdf">Cinematica</a>
                       <a href="images/mecanica/frnulas-de-dinmica-1-638.pdf">Dinamica</a>
                       <a href="images/mecanica/Gravi.pdf">Força gravitacional</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="#popup2">Termologia</a>
	</div>

			<div id="popup2" class="overlay">
				<div class="popup">
					<h2>Termologia</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						<a href="images/termologia/calorimetria%201.pdf">Calor, Trocas de calor e processo de propagaçao de calor.</a>
                        <a href="images/termologia/dilatao-trmica-4-638.pdf">dilataçao termica</a>
                        <a href="images/termologia/frmulas-de-dilatao-2-638.pdf">Dilataçao em liquidos</a>
                        <a href="images/termologia/frmulas-de-termometria-1-638.pdf">Escalas e conversoes termometricas</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="#popup3">Onda</a>
	</div>

			<div id="popup3" class="overlay">
				<div class="popup">
					<h2>Onda</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						<a href="images/onda/frmula-de-ondas-1-638.pdf">Classificaçao e velocidade de propagaçao</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="#popup4">Eletromagnetismo</a>
	</div>

			<div id="popup4" class="overlay">
				<div class="popup">
					<h2>Eletromagnetismo</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
						<a href="images/eletromagnetismo/frmulas-de-eletrodinmica-1-638.pdf">Corrente, Resistência, Associaçao e Potência eletrica dissipada em um resistor.</a>
                        <a href="images/eletromagnetismo/frmulas-de-eletromagnetismo-1-638.pdf">Campo e Força magnetica</a>
                        <a href="images/eletromagnetismo/frmulas-de-eletrosttica-1-638.pdf">Eletrostatica</a>
					</div>
				</div>
			</div>
	<div class="box">
		<a class="button" href="#popup5">Óptica</a>
	</div>

			<div id="popup5" class="overlay">
				<div class="popup">
					<h2>Óptica</h2>
					<a class="close" href="#">&times;</a>
					<div class="content">
					<a href="images/optica/frmula-de-ptica-geomtrica-1-638.pdf">Principios, Reflexao, Espelhos e lentes esfericas</a>
					</div>
				</div>
			</div>
	
	
</body>
</html>