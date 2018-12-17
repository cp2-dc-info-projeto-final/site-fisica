<?php
require_once('acesso_ao_banco.php');


function /*BuscaArquivoEntregue*/BuscaUploaFor(int $usuariosid, int $idUpload) : string
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT arquivo FROM uploadfor
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();

	return $sql->fetchColumn(0);
}


function /*EntregaTarefa*/upload_feito($upload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('INSERT INTO uploadfor ( nome, arquivo, usuariosid ,ass)
	                     VALUES (:valnome,:valArquivo,:valusuariosid ,:valass)');
	
	
	$sql->bindValue(':valnome', $upload['nome']);
	$sql->bindValue(':valArquivo', $upload['arquivo']);
	$sql->bindValue(':valusuariosid', $upload['usuariosid']);
	$sql->bindValue(':valass',$upload['ass']);
	$sql->execute();
}


function /*ApagarTarefa*/ApagarUploadFor(int $usuarioid, int $idUpload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('DELETE FROM uploadfor
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();
}

  
  function ListadeUpload($ass) : array
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT uploadfor.* FROM uploadfor 
    					 INNER JOIN usuarios on usuarios.id = uploadfor.usuariosid 
    					 WHERE ass = :valId');

    

    $sql->bindValue(':valId', $ass);

    $sql->execute();

    return $sql->fetchAll();
  }
 function /*ApagarTarefa*/RelacaoUpForAssuntos(int $usuarioid, int $idUpload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT uploadfor.* FROM uploadfor
	                     INNER JOIN assuntos ON assuntos.id = uploadfor.id');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();
}
?>