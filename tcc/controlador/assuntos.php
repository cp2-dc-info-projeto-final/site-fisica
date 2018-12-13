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
    else if (strlen($nome) < 4 || strlen($nome )>61)
    {
      $erros[] = "A quantidade do campo nome deve ser entre 5 e 60.";
    }


    if (empty($erros))
    {

       $nome = add_assuntos($request);
       $_SESSION['idassuntos'] = $idassuntos;
       header('Location:../formulas.php');
    }
    else
    {
      $_SESSION[' errosCadastrados'] = $erros;
      header('Location:../formulas.php');

    }
?>
