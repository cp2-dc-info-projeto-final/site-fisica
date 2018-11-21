<?php
require_once('../modelo/tabelaupload.php');
require_once('../modelo/tabelausuario.php');


$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 
             	
               	'arquivo' => FILTER_DEFAULT,
               	'nome' =>FILTER_DEFAULT,
               	'usuariosid'=>FILTER_VALIDATE_INT
                 

                 ]
           );




session_start();


if (array_key_exists('idUsuárioConectado', $_SESSION))
{

	$id = $_SESSION['idUsuárioConectado'];
	$master = BuscaUsuarioPorId($id);
	

}
else
{
	$_SESSION['erroLogin'] = 'Identifique-se para poder carregar um arquivo';
	Redireciona('../login.php');
}



$erro = null;


if(isset($_FILES['arquivo'])):
	$formatosPermitidos =  array("pdf" ,"zip" , "docx" ,"doc","txt"  );
	$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
	if (in_array($extensao, $formatosPermitidos)):
		$temporario	= $_FILES['arquivo']['tmp_name'];
		$novoNome = $_FILES['arquivo']['name'];
		$pasta = "../arquivos/$novoNome";
		if(move_uploaded_file($temporario,$pasta.$novoNome)):
			$request['arquivo'] = $pasta;
			$request['nome'] = $novoNome;
			$request['usuariosid'] = $master['id'];
			$menssagem = "Upload feito com sucesso!";
			$id = upload_feito($request);
   			
   			header('Location: ../exercicios.php');	
		else:
			$menssagem = "Erro, não foi possivel fazer o upload!";

		endif;
	else:
		$menssagem = "Formato invalido";
	endif;
echo $menssagem;

endif; 
?>
