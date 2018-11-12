<?php
session_start();

	if (array_key_exists('errosCadastrado', $_SESSION))
	{
		$erros = $_SESSION['errosCadastrado'];
		unset($_SESSION['errosCadastrado']);

		
	}
	else
	{
		$erros = null;
	}


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
		<form name="signup" method="post" action="controlador/cadastrando.php">
								<h2>Cadastro</h2>
								<?php if ($erros != null) { ?>
			<div class="alert alert-warning">
				<ul>
					<?php foreach ($erros as $erro) { ?>
						<li> <?= $erro ?> </li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>

			<label><b class="textcol">Nome</b></label>
			<input type="text" placeholder="Digite seu nome" name="nome" required="">
								
			<label><b class="textcol">Usuário</b></label>
			<input type="text" minlength="6" maxlength="16" placeholder="Digite seu usuário" name="usuario" required="">
			
			<label><b class="textcol">Email</b></label>
			<input type="email " placeholder="Digite seu email" name="email" required="">
			
			<label><b class="textcol">Senha</b></label>
			<input type="password" minlength="7" maxlength="12" placeholder="Digite sua senha" name="senha" required="">
			
			<label><b class="textcol">Confirma senha</b></label>
			<input type="password" minlength="7	" maxlength="12" placeholder="Digite novamente sua senha" name="confirmasenha" required="">
			<br>
			
			<input type="checkbox" name= "termo" value= "botao" checked class="checkbox" required><p class="Aceita">Você aceita os termos de uso ?</p>
			<br>
			
			<button type="submit" class="btn2">Cadastrar</button>
      		<button type="button" class="btn3" onclick="closeForm()">Fechar</button>

    
      		
		</form>
	
	
	</div>
			
</body>
</html>