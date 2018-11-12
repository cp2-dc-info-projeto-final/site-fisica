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
		header('Location: perfil.php');
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

h2{
	font-family: Times New Roman;
	font-weight: lighter;
	color: #fff;
	font-size: 50px;
  text-align: center;
}
.Login{
	border: 1px solid rgba(255,255,255, 0.3);
	border-radius: 3px;
	padding: 0px;
	position: absolute;
	top: 50%;
	left:50%;
	transform: translate(-50%, -50%);
	width: 20%;
	height: 45%;
	background: hsla(0, 100%, 0%, 0.6);
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
	width: 80%;
	height: 50%;
	font-size: 16px;
	background: #000;
	font-weight: lighter;
	color: #fff;
	border-color:solid #fff;
	border: 0px;
	text-align: center;
	text-transform: uppercase;
	font-family: Times New Roman;
	background-color: rgba(0,0,0,0);
  border-radius: 14px;
}

.textcol{
	color: #fff;
	position: absolute;
	left: 5%;
}

.btn3{
	position:absolute;
	height: 7%;
	top: 75%;
	left:30%;
	transform:translate(-10%, -15%);
  border-radius: 14px;
  background: #000;
  left: 18%;

}
a:link {
	color:#fff;
}
a:visited {
	color: #fff;
}
a:active {
	color: #fff;
}
.a1{
  position: absolute;
  top: 85%;
  left: 5%;
  text-decoration: none;
}
.a2{
  position: absolute;
  top: 90%;
  left: 5%;
  text-decoration: none;
}
</style>    
<head>
<meta charset="utf-8">
<title>Login - Aluno</title>
</head>
<body>
    
	<div class="Login"> 
        
     <?php if ($erro != null) { ?>

        <div class="alert alert-warning">
          <script>alert("<?= $erro ?>");</script>

        </div>
      <?php } ?>
        
		<form method="POST" action = "Controlador/usuario/entrar.php">
            					<h2>Login</h2>
                   <b class="textcol"></b>
                    <input name="user"type="text" placeholder="Digite seu usuário">

                    <b class="textcol"></b>
                    <input name="senha" type="password" placeholder="Digite sua senha">
                    <br>

      		            <button type="button" class="btn3">Entrar</button>
            
					<a href="EsqueceuSenha.html" class="a1">Esqueceu sua senha ?</a><br>
					<a href="Cadastro.php" class="a2">Não possui cadastro ?</a><br>
	   </form>
	</div>

</body>
</html>