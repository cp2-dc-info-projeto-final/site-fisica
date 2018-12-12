<?php
require_once('acesso_ao_banco.php');

/*
function /AdicionarNovoAssunto/ InsereAssunto($novoassunto)
{
    $bd = CriaConexãoBd();

	$sql = $bd -> prepare('INSERT INTO assunto (nome) VALUES (:valnome)');
	
	$sql -> bindValues(':valnome', $upload['nome']);

	$sql -> execute();
}
*/

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












function /*BuscaArquivoEntregue*/BuscaUploadFor(int $usuariosid, int $idUpload) : string
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('SELECT arquivo FROM uploadfor
	                     WHERE $usuariosid = :valusuariosid AND $idUpload = :valIdUpload');

	$sql->bindValue(':valusuariosid', $usuariosid);
	$sql->bindValue(':valIdUpload', $idUpload);

	$sql->execute();

	return $sql->fetchColumn(0);
}


function /*EntregaTarefa*/upload_feitoFor($uploadfor)
{
	$bd = CriaConexãoBd();

	$sql = $bd->prepare('INSERT INTO uploadfor ( nome, arquivo, usuariosid ,ass)
	                     VALUES (:valnome,  :valArquivo,:valusuariosid ,:valass)');
	
	
	$sql->bindValue(':valnome', $uploadfor['nome']);
	$sql->bindValue(':valArquivo', $uploadfor['arquivo']);
	$sql->bindValue(':valusuariosid', $uploadfor['usuariosid']);
	$sql->bindValue(':valass',$uploadfor['ass']);
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

  
  function ListadeUploadFor($ass) : array
  {
  
    $bd = CriaConexãoBd();

    $sql = $bd->prepare('SELECT uploadfor.* FROM uploadfor 
    					 INNER JOIN usuarios on usuarios.id = uploadfor.usuariosid 
    					 WHERE ass = :valId');

    

    $sql->bindValue(':valId', $ass);

    $sql->execute();

    return $sql->fetchAll();
  }


?>

