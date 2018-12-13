<!doctype html>
<?php
	session_start();

	if (array_key_exists('erroLogin', $_SESSION))
	{
		$erros = $_SESSION['erroLogin'];
		unset($_SESSION['erroLogin']);


	}
	else
	{
		$erros = null;
	}

?>

<html>
<head>
<meta charset="utf-8">
<title>Login - Aluno</title>
<link rel="stylesheet" type="text/css" href="styleLogAlu.css">
</head>
<body>
	<div class="Login">
		<form name="Login" method="post" action="controlador/Entrar.php">
								<h2>Login</h2>
			<label for="user"><b class="textcol">Email ou Matricula</b></label>
			<input type="text" name="emailmatricula" placeholder="Digite seu email ou matrícula ">

			<label for="senha"><b class="textcol">Senha</b></label>
			<input type="password" name="senha" placeholder="Digite sua senha">
			<br>

      		<button type="submit" class="btn3">Entrar</button>
					<a href="EsqueceuSenha.html" class="a1">Esqueceu sua senha ?</a><br>
					<a href="cadastroprof.php" class="a2">Não possui cadastro ?</a><br>
		</form>


	</div>


</body>
</html>
