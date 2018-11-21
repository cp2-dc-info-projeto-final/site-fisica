<?php
require_once('acesso_ao_banco.php');
function /*BuscaArquivoEntregue*/BuscaUpload(int $usuariosid, int $idUpload) : string
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT arquivo FROM upload
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();

	return $sql->fetchColumn(0);
}


function /*EntregaTarefa*/upload_feito($upload )
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('INSERT INTO upload ( nome, arquivo, usuariosid)
	                     VALUES (:valnome,  :valArquivo,:valusuariosid)');
	
	
	$sql->bindValue(':valnome', $upload['nome']);
	$sql->bindValue(':valArquivo', $upload['arquivo']);
	$sql->bindValue(':valusuariosid', $upload['usuariosid']);
	
	$sql->execute();
}


function /*ApagarTarefa*/ApagarUpload(int $usuarioid, int $idUpload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('DELETE FROM upload
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();
}


?>
