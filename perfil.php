<?php
	
	require_once("Tabela/conexaobd.php");
	
	session_start();
	if($_SESSION['emailUsuarioLogado'] == "")
	{
		header("Location: InstaCP2.php");
	}
	$email =  $_SESSION['emailUsuarioLogado'];
	
	
	
	
	function buscaNome(string $emaillegal){
    $bd = criaconexaobd();
    $sql = $bd -> prepare (
      "select nome from usuario
      where email = :valemail");
      $sql -> bindValue(':valemail', $emaillegal);
      $valor	= $sql -> execute();
      $resultado = $sql->fetch();
      return $resultado['nome'];
	}  
	
	
	
	$nome = buscaNome($email);
?>

	<html>
	
	<h1>InstaCPII</h1>
	
	<h2> Perfil de <?= $nome ?> </h2>
	
	<a  href= "Controlador/Usuário/sair.php"> Sair </a>
	
	</html>