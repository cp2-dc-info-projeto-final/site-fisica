<?php
require_once('../modelo/tabelauploadvid.php');
require_once('../modelo/tabelausuario.php');


$request = array_map('trim', $_REQUEST);
$request = filter_var_array(
               $request,
               [ 
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



$vid = $request['vid'];
if ($vid == false)
{
  $erros[] = "Deve ter assunto";
}
else if($vid < 0 || $vid > 60)
{
  $erros = "Assunto invalido";
}
if (empty($erros))
    {

if(isset($_FILES['arquivo'])):
  $formatosPermitidos =  array("mp4", "avi" , "mov" , "wmv" , "3gp", "3g2" , "rmvb" , "flv" , "mkv" , "rm");
  $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
  if (in_array($extensao, $formatosPermitidos)):
    $temporario = $_FILES['arquivo']['tmp_name'];
    $novoNome = $_FILES['arquivo']['name'];
    $pasta = "arquivos/$novoNome";
    if(move_uploaded_file($temporario,"../$pasta")):
      $request['arquivo'] = $pasta;
      $request['nome'] = $novoNome;
      $request['usuariosid'] = $master['id'];
      $menssagem = "Upload feito com sucesso!";
      $id = upload_feito($request);
        
        
    else:
      $erros = "Erro, não foi possivel fazer o upload!";

    endif;
  else:
    $erros = "Formato invalido";
  endif;
endif;
      header('Location:../videos.php');
    }
    else
    {
      $_SESSION['errosupvideos'] = $erros;
      header('Location:../videos.php');

    }


?>