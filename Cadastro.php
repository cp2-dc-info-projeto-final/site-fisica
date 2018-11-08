<?php
	session_start();


		if(empty($_SESSION['erroLogin']) == false)
		{
			$erro = $_SESSION['erroLogin'];
			unset($_SESSION['erroLogin']);
		}
		else {
			$erro = null;
		}
		
		if(empty($_SESSION['emailUsuarioLogado']) == false)
		{
		header('Location: Perfil.php');
		}
?>
 
 
 
 
<!doctype html>
<html>
<style>
html{
	margin:0;
	padding: 0;
	width: 100%;
}

body{
	margin: 0;
	padding: 0;
	width: 100%;
	background: url(images/fis.jpg) no-repeat 50% 50%;
	background-size: cover;
	height: 100vh;
	display: table;
}

.Cadastro{
	border: 1px solid rgba(255,255,255, 0.3);
	border-radius: 3px;
	padding: 0px;
	position: absolute;
	top: 50%;
	left:50%;
	transform: translate(-50%, -50%);
	width: 40%;
	height: 90%;
}

h2{
	font-family: Times New Roman;
	font-weight: lighter;
	color: #fff;
	font-size: 50px;
	text-align: center;
}

input{
	display: block;
	width: 90%;
	height: 10%;
	background: rgba(0,0,0,0.3);
	outline: none;
	border: 1px solid rgba(0,0,0,0.3);
	font-family: Times New Roman;
	font-weight: lighter;
	font-size: 100%;
	margin-bottom: 5%;
	padding-left: 0%;
	border-radius: 14px;
	text-align: left;
	color: #E5E5E5;
	margin-left: 5%;
}

button{
	width: 50%;
	height: 50%;
	font-size: 16px;
	background: #000;
	font-weight: lighter;
	color: #fff;
	border-color:solid #fff;
	border: 0px;
	border-radius: 0%;
	text-align: center;
	text-transform: uppercase;
	font-family: Times New Roman;
	background-color: rgba(0,0,0,0);
}

.checkbox{
	height: 2.5%;
	position: absolute;
	top: 78%;
	left: -20%;
}

.textcol{
	color: #fff;
	position: relative;
	left: 5%;

}
.Aceita{
	position: absolute;
	left: 33%;
	top: 75%;
	font-size: 110%;

}
.btn2{
	position:absolute;
	height: 7%;
	top: 85%;
	left:30%;
	transform:translate(-10%, -15%);
}
.btn3{
	position:absolute;
	height: 7%;
	top: 90%;
	left:30%;
	transform:translate(-10%, -15%);
}

</style>
<head>
<meta charset="utf-8">
<title>Cadastro</title>
</head>
<body>
    
     <?php if ($erro != null) { ?>

        <div class="alert alert-warning">
          <script>alert("<?= $erro ?>");</script>

        </div>
      <?php } ?>


	<div class="Cadastro">
		<form method="POST" novalidate action="Controlador/usuario/cadastrausuario.php" >
								<h2>Cadastro</h2>
			<b class="textcol">Nome</b>
			<input name="nome" type="text" placeholder="Digite seu nome">

			<b class="textcol">Usuário</b>
			<input name="usuario" type="text" placeholder="Digite seu usuário">

			<b class="textcol">Email</b>
			<input name="email" type="text" placeholder="Digite seu email">

			<b class="textcol">Senha</b>
			<input name="senha" type="password" placeholder="Digite sua senha">

			<b class="textcol">Confirma senha</b>
			<input name="confirmasenha" type="password" placeholder="Digite novamente sua senha">
			<br>

			<input type="checkbox" name= "termo" value= "botao" checked class="checkbox"><p class="Aceita">Você aceita os termos de uso ?</p>
			<br>

            <button name="botao" type="submit" class="btn2">Cadastrar</button>
      		<button type="button" class="btn3" onclick="closeForm()">Fechar</button>
		</form>


	</div>

</body>
</html>
