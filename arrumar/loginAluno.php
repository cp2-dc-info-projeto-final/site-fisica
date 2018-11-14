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
			<label for="user"><b class="textcol">Usuário</b></label>
			<input type="text" placeholder="Digite seu usuário">

			<label for="senha"><b class="textcol">Senha</b></label>
			<input type="password" placeholder="Digite sua senha">
			<br>

      		<button type="submit" class="btn3">Entrar</button>
					<a href="EsqueceuSenha.html" class="a1">Esqueceu sua senha ?</a><br>
					<a href="Cadastro.html" class="a2">Não possui cadastro ?</a><br>
		</form>


	</div>

</body>
</html>
