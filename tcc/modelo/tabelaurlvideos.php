<?php
require_once('acesso_ao_banco.php');


function Listaurl()  
{

  $bd = CriaConexãoBd();

  $sql = $bd->prepare("SELECT * FROM urlvideos ");

  $sql->execute();

  return $sql->FetchAll();
}



function add_url($novourl)
{
 
  $bd = CriaConexãoBd();
	
  $sql = $bd -> prepare('INSERT INTO urlvideos(nome , url) VALUES (:valnome , :valurl)');
  
  $sql->bindValue(':valnome', $novourl['nome']);
  $sql->bindValue(':valurl', $novourl['url']);
  
  $sql->execute();
  
  return $bd->lastInsertid();
}
      
  function Pesquisanome($nome)
  {

    $bd = CriaConexãoBd();
    $sql = $bd -> prepare('SELECT nome FROM urlvideos WHERE nome = :valnome;');
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
  

  function Pesquisaurl($url)
  {

    $bd = CriaConexãoBd();
    $sql = $bd -> prepare('SELECT url FROM urlvideos WHERE url = :valurl;');
    $sql -> bindValue(':valurl', $url);
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