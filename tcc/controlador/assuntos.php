<?php
require_once('../modelo/acesso_ao_banco.php');
require_once('../modelo/tabelaassunto.php');

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
    else if (Pesquisanomeass($nome) != false)
    {
      $erros[] = "Ja existe esse campo";
    }


    if (empty($erros))
    {

       $nome = add_assuntos($request);
       header('Location:../formulas.php');
    }
    else
    {
      session_start();
      $_SESSION['errosformulas'] = $erros;
      header('Location:../formulas.php');

    }
?>
