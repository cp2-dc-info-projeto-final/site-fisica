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



</body>
</html>﻿