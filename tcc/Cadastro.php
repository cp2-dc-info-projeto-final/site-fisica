<?php
ob_start();
session_start();
$botao = filter_input(INPUT_POST, 'botao', FILTER_SANITIZE_STRING);
if($botao){
	include_once 'conexao.php';
	$DD = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$erro = false;
	
	$GG = array_map('strip_tags', $DD);
	$btn = array_map('trim', $GG);
	
	if(in_array('',$btn)){
		$erro = true;
		$_SESSION['msg'] = "Os campos não podem ficar vazios";
	}elseif((strlen($btn['senha'])) < 8){
		$erro = true;
		$_SESSION['msg'] = "A senha deve ter no minímo 8 caracteres";
	}
	else{
		$usuario_r = "SELECT id FROM usuarios WHERE usuario='". $btn['usuario'] ."'";
		$resultadoU = mysqli_query($side, $usuario_r);
		if(($resultadoU) AND ($resultadoU->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este usuário já está sendo utilizado";
		}
		
		$usuario_r = "SELECT id FROM usuarios WHERE email='". $btn['email'] ."'";
		$resultadoU = mysqli_query($side, $usuario_r);
		if(($resultadoU) AND ($resultadoU->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] = "Este e-mail já está cadastrado";
		}
	}
	
	if(!$erro){

		$btn['senha'] = password_hash($btn['senha'], PASSWORD_DEFAULT);
		
		$usuario_r = "INSERT INTO usuarios (nome, usuario, email, senha, confirmasenha) VALUES (
						'" .$btn['nome']. "',
						'" .$btn['usuario']. "',
						'" .$btn['email']. "',
						'" .$btn['senha']. "',
						'" .$btn['confirmasenha']. "'
						)";
		$resultado_usario = mysqli_query($side, $usuario_r);
		if(mysqli_insert_id($side)){
			$_SESSION['msgcad'] = "Usuário cadastrado com sucesso";
			header("Location: login.php");
		}else{
			$_SESSION['msg'] = "Erro ao cadastrar o usuário";
		}
	}
	
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
		<form name="signup" method="post" action="cadastrando.php">
								<h2>Cadastro</h2>
				<?php
				if(isset($_SESSION['msg'])){
					unset($_SESSION['msg']);
					echo ($_SESSION['msg']);
				}
		?>					
			<label ><b class="textcol" >Nome</b></label>
			<input type="text" placeholder="Digite seu nome" name="nome" required>
			
			<label ><b class="textcol" >Usuário</b></label>
			<input type="text" minlength="6" maxlength="16" placeholder="Digite seu usuário" name="usuario" required>
			
			<label ><b class="textcol" >Email</b></label>
			<input type="email" minlength="10" maxlength="30" placeholder="Digite seu email" name="email" required>
			
			<label ><b class="textcol" >Senha</b></label>
			<input type="password" minlength="7" maxlength="15" placeholder="Digite sua senha" name="senha" required>
			
			<label ><b class="textcol" >Confirma senha</b></label>
			<input type="password" minlength="7	" maxlength="15" placeholder="Digite novamente sua senha" name="confirmasenha" required>
			<br>
			
			<input type="checkbox" name= "termo" value= "botao" checked class="checkbox"><p class="Aceita">Você aceita os termos de uso ?</p>
			<br>
			
			<button name="botao" type="submit" class="btn2">Cadastrar</button>
      		<a href="paginInc.html"> <button type="button" class="btn3" onclick="closeForm()">Fechar</button> </a>
		</form>
	
	
	</div>
			
</body>
</html>