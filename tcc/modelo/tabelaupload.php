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


function /*EntregaTarefa*/upload_feito($upload)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('INSERT INTO upload ( nome, arquivo, usuariosid ,ano)
	                     VALUES (:valnome,  :valArquivo,:valusuariosid ,:valano)');
	
	
	$sql->bindValue(':valnome', $upload['nome']);
	$sql->bindValue(':valArquivo', $upload['arquivo']);
	$sql->bindValue(':valusuariosid', $upload['usuariosid']);
	$sql->bindValue(':valano',$upload['ano']);
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

  
  function ListadeUpload($ano) : array
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT upload.* FROM upload 
    					 INNER JOIN usuarios on usuarios.id = upload.usuariosid 
    					 WHERE ano = :valId');

    

    $sql->bindValue(':valId', $ano);

    $sql->execute();

    return $sql->fetchAll();
  }


?>
