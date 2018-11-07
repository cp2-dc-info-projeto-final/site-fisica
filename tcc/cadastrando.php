<!DOCTYPE html>
<html>
<head>
	<title>Cadastrando</title>
</head>
<body>

<?php
$host="localhost";
$user="root";
$pass="";
$banco="cadastro";
$conexao=mysqli_connect($host, $user, $pass) or die(mysqli_error());
mysqli_select_db($conexao,$banco) or die(mysqli_error());
?>


<?php
$nome=$_POST['nome'];
$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$confirmasenha=$_POST['confirmasenha'];
$email=$_POST['email'];
$sql=mysqli_query($conexao," INSERT INTO usuarios(nome, usuario, senha, confirmasenha, email) VALUES ('$nome','$usuario','$senha',
	'$confirmasenha', '$email')");
echo "<center><h1>Cadastro realizado com sucesso</h1></center>";
mysqli_close($conexao);
?>

<?php
/*$erros = [];
		
		$request = array_map('trim', $_REQUEST);
		$request = filter_var_array(
			$request,
			[
				'nome' => FILTER_DEFAULT,
				'usuario' => FILTER_DEFAULT,
				'email' => FILTER_VALIDATE_EMAIL,
				'senha' => FILTER_DEFAULT,
				'confirmasenha' => FILTER_DEFAULT,
				'aceitaTermos' => FILTER_VALIDATE_BOOLEAN,
			]
		);
		
		$nome = $request['nome'];
	if($nome == false)
	{
		$erros[] = "O nome informado não é válido";
	}
		 else if( strlen($nome) < 3 || strlen($nome) > 35)
		{
			$erros[] = "A quantidade de caracteres do nome deve estar entre 3 e 35";
		}

	$usuario = $request['usuario'];
	
	if($usuario == false)
	{
		$erros[] = "O usuario não é válido";
	}
	
	else if ( strlen($usuario) < 3 || strlen($usuario) > 35)
	{
	$erros[] = "A quantidade de caracteres do sobrenome deve estar entre 3 e 35";
	}
	
	$senha = $request['senha'];
	
	if($senha == false)
	{
		$erros[] = "Insira uma senha";
	}
    
	else if ( strlen($senha) < 6 || strlen($senha) > 12 )
	{
		$erros[] = "A quantidade de caracteres da senha deve estar entre 6 e 12";
	}
	
	$confirmasenha = $request['confirmasenha'];
	
	if($confirmasenha == false)
	{
		$erros[] = "Insira a confirmação de senha";
	}
	
	else if ( strlen($confirmasenha) < 6 || strlen($confirmasenha) > 12 )
	{
		$erros[] = "O número de caracteres da confirmação de senha deve estar entre 6 e 12";	
	}
	
	
	$termos = $request['aceitaTermos'];
	
	if($termos == false)
	{
		$erros[] = "Aceite os termos de uso";
	}
	
	if($senha != $confsenha)
	{
		$erros[] = "Senhas diferentes"; 
	}
	
	if(buscausuario($request['email'])>0){
			$erros[] = "Email já existe" ;
	}		
?>

<?php foreach($erros as $msg) { ?>
			<li><?= $msg ?></li>
		<?php } ?>

?>*/

</body>
</html>﻿