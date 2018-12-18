<?php

require_once('../modelo/tabelaurlvideos.php');
require_once('../modelo/tabelausuario.php');

$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 
                'nome' => FILTER_DEFAULT,
                'url' => FILTER_VALIDATE_URL,
                'vid' => FILTER_VALIDATE_INT
                 ]
           );



$erro = [];

session_start();


if (array_key_exists('idUsuárioConectado', $_SESSION))
{

  $id = $_SESSION['idUsuárioConectado'];
  $master = BuscaUsuarioPorId($id);
  

}
else
{
  $_SESSION['erroLogin'] = 'Identifique-se para poder carregar um arquivo';
  Redireciona('../login.php');
}



$nome = $request['nome'];
if ($nome == false)
{
  $erros[] = "O video deve ter um nome";
}
else if(strlen($nome) < 2 || strlen($nome )>256)
{
  $erros = " O nome deve ter entre 3 a 255 caractéres ";
}
else if (Pesquisanome($nome) != false )
{
    $erros[] = "O nome ja foi cadastrado";
}


$componentesUrl = [];

$url = $request['url'];
if ($url == false)
{
  $erros[] = "O campo do url deve ser preenchido";
}
else if(preg_match('/youtube\.com.*\/watch\?v=([^&]+)/', $url, $componentesUrl) ||
        preg_match('/youtu\.be\/([^?]+)/', $url, $componentesUrl))
{
  $request['url'] = "https://www.youtube.com/embed/{$componentesUrl[1]}";
  $url = $request['url'];
}

else if (Pesquisaurl($url) != false )
{
	$erros[] = "O url ja foi cadastrado";
}


 if (empty($erros))
    {

       $id = add_url($request);
       header('Location:../videos.php');
    }
    else
    {
      $_SESSION['errosvid'] = $erros;
      header('Location:../videos.php');

    }

?>
