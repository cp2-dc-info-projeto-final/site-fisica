<?php



require_once('../modelo/tabelaupload.php');
require_once('../modelo/tabelausuario.php');

session_start();

if (array_key_exists('idUsuárioConectado' , $_SESSION) )
{
  $id = $_SESSION['idUsuárioConectado'];
  $master = BuscaUsuarioPorId($id);
  if ($master['matricula'] != null) 
  {

	$erro = null;

	$request = array_map('trim', $_REQUEST);
	$request = filter_var_array(
               $request,
               [ 
                 'idUpload' => FILTER_VALIDATE_INT ]
           );


	$idupload = $request['idUpload'];
	if ($idupload == false)
	{
		$erro = "Filme inválido ou não informado";
	}

	if ($erro == null)
	{
		ApagarUpload($idupload);
		header('Location: ../exercicios.php');

}
	}
	else
	{
		$_SESSION['erroRemoverAvaliação'] = $erro;
	}

  }

else 
{
	header('Location: ../paginInc.php');
}

?>

