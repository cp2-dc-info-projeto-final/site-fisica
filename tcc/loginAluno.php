<!doctype html>
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
			<label for="user"><b class="textcol">Email</b></label>
			<input type="email" name="email" placeholder="Digite seu email">

			<label for="senha"><b class="textcol">Senha</b></label>
			<input type="password" name="senha" placeholder="Digite sua senha">
			<br>

      		<button type="submit" class="btn3">Entrar</button>
					<a href="EsqueceuSenha.html" class="a1">Esqueceu sua senha ?</a><br>
					<a href="Cadastro.html" class="a2">Não possui cadastro ?</a><br>
		</form>


	</div>

</body>
</html>