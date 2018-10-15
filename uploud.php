<html>
	<body>


	<?php
	if(isset($_POST['enviar-lista'])):
		$formatosPermitidos =  array("pdf" ,"zip" , "docx" );
		$extensao = pathinfo($_files['arquivo']['name'], pathinfo_extension);
		if (in_array($extensao, $formatosPermitidos)):
			$pasta = "../arquivos/";
			$temporario	= $_files['arquivo']['tmp_name'];
			$novoNome = uniquid().".$extensao";

			if(move_uploaded_file($temporario, $pasta.$novoNome)):
				$menssagem[] = "Upload feito com sucesso!";
			else:
				$menssagem[] = "Erro, não foi possivel fazer o upload!";
			endif;
		else:
			$menssagem[] = "Formato invalido"  ;
		endif;
		echo $menssagem;

	endif;
	
	?>
			
			<form action ="<?php echo $_SERVER['PHP-SELF']; ?>" method 	="	POST"  enctype="multpart/form-data">
			<input type="file" name = "arquivo"><br>
			<input type="submit" name="enviar-lista">
		</form>

	</body>
</html> 