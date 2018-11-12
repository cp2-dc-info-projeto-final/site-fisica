<html>
<head>
<title>cadastro</title>
</head>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$banco = "fisica";
$conexao = mysql_connect($host,$user,$pass) or die(mysql_error());
?>
<?php
$nome=$_POST['nome'];
$usuario=$POST['usuário'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$confirmarsenha=$_POST['confirmarsenha'];
$sql = mysql_query("INSERT INTO usuario(nome, usuario, email, senha, confirmarsenha) 
VALUES('$nome', '$usuario', '$email', '$senha', 'confirmarsenha')");
echo "cadastro realizado";
?>
</body>
</html>