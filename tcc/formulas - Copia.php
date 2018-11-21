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
					    <img src="images/mecanica/2%20lei%20de%20newton.png" alt="some text" width=60 height=40>
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
						Formula de fisica
						Formula de fisica
						Formula de fisicaFormula de fisica
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
						Formula de fisica
						Formula de fisica
						Formula de fisicaFormula de fisica
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
						Formula de fisica
						Formula de fisica
						Formula de fisicaFormula de fisica
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
						Formula de fisica
						Formula de fisica
						Formula de fisicaFormula de fisica
					</div>
				</div>
			</div>
	
	
</body>
</html>
