<?php
require_once('../modelo/acesso_ao_banco.php');
require_once('../modelo/tabelaassuntov.php');

$request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    ['nome' => 'FILTER_DEFAULT']);

$erros = [];
  $nome = $request['nome'];
    if ($nome == false)
    {
      $erros[] = "O campo deve ser preenchido para adicionar assunto";
    }
    else if (Pesquisanomeassv($nome) != false)
    {
      $erros[] = "O campo ja foi cadastrado.";
    }


    if (empty($erros))
    {

       $nome = add_assuntosv($request);
       header('Location:../videos.php');
    }
    else
    {
      $_SESSION['errosvid'] = $erros;
      header('Location:../videos.php');
    }
?>
