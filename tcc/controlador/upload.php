<?php
require_once('../modelo/tabelaupload.php');
require_once('../modelo/tabelausuario.php');



$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [
                'ano' => FILTER_VALIDATE_INT

                 ]
           );



$erro = [];

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

$ano = $request['ano'];
if ($ano == false)
{
	$erros[] = "Deve ter ano;";
}
else if($ano < 0 || $ano > 4)
{
	$erros = "Ano inválido";
}


if(isset($_FILES['arquivo'])):
	$formatosPermitidos =  array("pdf" ,"zip" , "docx" ,"doc","txt" ,"xlsx" ,"pptx" );
	$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
	if (in_array($extensao, $formatosPermitidos)):
		$temporario	= $_FILES['arquivo']['tmp_name'];
		$novoNome = $_FILES['arquivo']['name'];
		$pasta = "arquivos/$novoNome";
		if(move_uploaded_file($temporario,"../$pasta")):
			$request['arquivo'] = $pasta;
			$request['nome'] = $novoNome;
			$request['usuariosid'] = $master['id'];
			$menssagem = "Upload feito com sucesso!";
			$id = upload_feito($request);
   			

		else:
			$erros = "Erro, não foi possivel fazer o upload!";

		endif;
	else:
		$erros = "Formato inválido";
	endif;
endif;
 if (empty($erros))
    {
		
		header('Location:../exercicios.php');
    }
    else
    {
     
      $_SESSION['errosup'] = $erros;
      header("Location:../exercicios.php?ano=$ano");
      header('Location:../exercicios.php');

    }


?>
