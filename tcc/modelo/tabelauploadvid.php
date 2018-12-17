<?php
require_once('acesso_ao_banco.php');




function BuscaUploadFor(int $usuariosid, int $idUpload) : string
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT arquivo FROM uploadvid
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();

	return $sql->fetchColumn(0);
}


function upload_feito($upload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('INSERT INTO uploadvid ( nome, arquivo, usuariosid , vid)
	                     VALUES (:valnome, :valArquivo, :valusuariosid , :valvid)');
	
	
	$sql->bindValue(':valnome', $upload['nome']);
	$sql->bindValue(':valArquivo', $upload['arquivo']);
	$sql->bindValue(':valusuariosid', $upload['usuariosid']);
	$sql->bindValue(':valvid', $upload['vid']);
	$sql->execute();
}


function ApagarUploadFor(int $usuarioid, int $idUpload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('DELETE FROM uploadvid
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();
}

  
  function ListadeUpload($vid) : array
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT uploadvid.* FROM uploadvid 
    					 JOIN usuarios ON usuarios.id = uploadvid.usuariosid 
    					 WHERE vid = :valvid');

    $sql->bindValue(':valvid', $vid);

    $sql->execute();

    return $sql->fetchAll();
  }

 function RelacaoUpForAssuntos(int $usuarioid, int $idUpload)
{
	$bd = CriaConexãoBd();

	$sql = $bd-> prepare('SELECT uploadvid.* FROM uploadvid
	                     INNER JOIN assuntos ON assuntos.id = uploadvid.id');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();
}
?>