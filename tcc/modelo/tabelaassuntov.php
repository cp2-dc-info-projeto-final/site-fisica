<?php
require_once('acesso_ao_banco.php');


function ListaAssuntosv()  
{

  $bd = CriaConexãoBd();

  $sql = $bd->prepare("SELECT * FROM assuntosv ");

  $sql->execute();

  return $sql->FetchAll();
}



function add_assuntosv($novoassunto)
{
 
  $bd = CriaConexãoBd();
	
  $sql = $bd -> prepare('INSERT INTO assuntosv(nome) VALUES (:valnome)');
  
  $sql->bindValue(':valnome', $novoassunto['nome']);
  
  $sql->execute();
  
  return $bd->lastInsertid();
}
function Pesquisanomeassv($nome)
  {

    $bd = CriaConexãoBd();
    $sql = $bd -> prepare('SELECT nome FROM assuntosv WHERE nome = :valnome;');
    $sql -> bindValue(':valnome', $nome);
    $sql -> execute();

    if ($sql -> rowCount() == 0)
    {

      return 0;

    } 
    else 
    { 

      return 1;

    }
   }
function Apagarassuntovid(int $idassunto)
{
  $bd = CriaConexãoBd();

  $sql = $bd->prepare('DELETE FROM  uploadvid
                       WHERE vid = :valIdUpload');

  
  $sql->bindValue(':valIdUpload', $idassunto);

  $sql->execute();
  
  $sql = $bd->prepare('DELETE FROM urlvideos 
                       WHERE vid = :valIdUpload');

  
  $sql->bindValue(':valIdUpload', $idassunto);

  $sql->execute();


  $sql = $bd->prepare('DELETE FROM assuntosv 
                       WHERE id = :valIdUpload');

  
  $sql->bindValue(':valIdUpload', $idassunto);

  $sql->execute();



}

?>