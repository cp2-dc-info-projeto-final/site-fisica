<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro</title>
<link rel="stylesheet" type="text/css" href="styleCad.css">
</head>
<body> 
	<div class="Cadastro">
		<form name="signup" method="post" action="cadastrando.php">
								<h2>Cadastro</h2>
			<label><b class="textcol">Nome</b></label>
			<input type="text" placeholder="Digite seu nome" name="nome">
								
			<label><b class="textcol">Usuário</b></label>
			<input type="text" minlength="6" maxlength="16" placeholder="Digite seu usuário" name="usuario">
			
			<label><b class="textcol">Email</b></label>
			<input type="email " minlength="16" maxlength="30" placeholder="Digite seu email" name="email">
			
			<label><b class="textcol">Senha</b></label>
			<input type="password" minlength="7" maxlength="12" placeholder="Digite sua senha" name="senha">
			
			<label><b class="textcol">Confirma senha</b></label>
			<input type="password" minlength="7	" maxlength="12" placeholder="Digite novamente sua senha" name="confirmasenha">
			<br>
			
			<input type="checkbox" name= "termo" value= "botao" checked class="checkbox"><p class="Aceita">Você aceita os termos de uso ?</p>
			<br>
			
			<button type="submit" class="btn2">Cadastrar</button>
      		<button type="button" class="btn3" onclick="closeForm()">Fechar</button>
      		
		</form>
	
	
	</div>
			
</body>
</html>