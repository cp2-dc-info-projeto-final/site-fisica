<?php

	session_start();
	
	if (array_key_exists('emailLogado', $_SESSION) == true){
		
		header('Location: Visao/perfilUsuario.php');
		
	}

?>
<html>

  <head>

    <title>Bem-vindo ao CPIInstagram</title>
    <meta charset="utf-8">


  </head>

  <body>

    <center><h1>CPIInstagram</h1></center>
    <br>
	
	<?php

		if(array_key_exists('erros', $_SESSION)){
			
			echo('<center>');
			
			foreach($_SESSION['erros'] as $erro){
				
				echo(' | '.$erro);
				
			}
			
			echo('</center>');
			
			unset($_SESSION['erros']);
			
		}

	?>

    <form method="post" action="Controlador/entrar.php">

      <center><h3>Login</h3></center>

      <center><label>E-mail: </label><input id = "email" name="email" type="email" required></center>
      <center><label>Senha: </label><input type = "password" email="senha" name="senha" required ></center>

      <center><input type="submit" value="Fazer login" id = "botaoLogin"></center>
      <br>
      <center><a href="Controlador/Usuario/pagCadastro.html">Não sou cadastrado</a></center>

    </form>

  </body>

</html>
