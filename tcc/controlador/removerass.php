<?php



require_once('../modelo/tabelaassunto.php');
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
                 'id' => FILTER_VALIDATE_INT ]
           );


	$id = $request['id'];
	if ($id == false)
	{
		$erro = "Filme inválido ou não informado";
	}

	if ($erro == null)
	{
		Apagarassunto($id);
		header('Location: ../formulas.php');

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

