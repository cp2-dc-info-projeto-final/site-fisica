<?php 

		include("conexao.php");
		if(isset($_POST[ok])){

			$email = $mysqli->escape_string($_POST['email']);

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$erro[] = "E-mail inválido.";
			}

			$sql_code = "SELECT senha, codigo from usuario where email = '$email'";
			$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
			$dado = $sql_query->fetch_assoc();
			$total = $sql_query->num_rows;

			if(total == 0)
				$erro[] = "O e-mail informado ainda não foi cadastrado.";

			if(count($erro) == 0 && $total > 0){

				novasenha = substr(md5(time()), 0, 6);
				$nscriptografada = md5(md5($novasenha));
			}
			
		}
?>