<?php

session_start()

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro</title>
<link rel="stylesheet" type="text/css" href="styleCad.css">
</head>
<body> 
	<div class="Cadastro">
		<form method="post" action="CADASTROUSUARIO.php">
								<h2>Cadastro</h2>

								<?php 
								if(isset($_SESSION['msg']))
									echo $_SESSION['msg'];
									unset($_SESSION['msg'])

								 ?>
			<label for="user"><b class="textcol">Nome</b></label>
			<input type="text" placeholder="Digite seu nome">
			
			<label for="user"><b class="textcol">Usuário</b></label>
			<input type="text" minlength="6" maxlength="16" placeholder="Digite seu usuário">
			
			<label for="email"><b class="textcol">Email</b></label>
			<input type="email" minlength="10" maxlength="30" placeholder="Digite seu email">
			
			<label for="senha"><b class="textcol">Senha</b></label>
			<input type="password" minlength="7" maxlength="15" placeholder="Digite sua senha">
			
			<label for="confirmaSenha"><b class="textcol">Confirma senha</b></label>
			<input type="password" minlength="7	" maxlength="15" placeholder="Digite novamente sua senha">
			<br>
			
			<input type="checkbox" name= "termo" value= "botao" checked class="checkbox"><p class="Aceita">Você aceita os termos de uso ?</p>
			<br>
			
			<button type="submit" class="btn2">Cadastrar</button>
      		<a href="paginInc.html"> <button type="button" class="btn3" onclick="closeForm()">Fechar</button> </a>
		</form>
	
	
	</div>
			
</body>
</html>