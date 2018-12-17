<?php
require_once('acesso_ao_banco.php');


function ListaAssuntos()  
{

  $bd = CriaConexãoBd();

  $sql = $bd->prepare("SELECT * FROM assuntos ");

  $sql->execute();

  return $sql->FetchAll();
}



function add_assuntos($novoassunto)
{
 
  $bd = CriaConexãoBd();
	
  $sql = $bd -> prepare('INSERT INTO assuntos(nome) VALUES (:valnome)');
  
  $sql->bindValue(':valnome', $novoassunto['nome']);
  
  $sql->execute();
  
  return $bd->lastInsertid();
}
function Pesquisaurl($nome)
  {

    $bd = CriaConexãoBd();
    $sql = $bd -> prepare('SELECT nome FROM assuntos WHERE nome = :valnome;');
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

?>