<?php

	require_once('../Modelo/TabelaUsuarios.php');
	
	session_start();
	
	if (array_key_exists('emailLogado', $_SESSION) == false){
		
		$_SESSION['erros'] = ['Para acessar a página de perfil é necessário estar logado'];
		
		header('Location: ../index.php');
		
	}
	
	$emailLogado = $_SESSION['emailLogado'];
	
	$nome =  RelacionaNome(($emailLogado);

?>
<html>
 
	<h1>Instacp2</h1>
	
	<h2>Perfil de <?php echo($nome); ?></h2>
	
	<a href="../Controlador/sair.php">Sair</a>
	
</html>