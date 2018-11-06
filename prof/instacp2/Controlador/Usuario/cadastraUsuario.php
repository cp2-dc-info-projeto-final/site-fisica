<?php

  require_once('../../Modelo/TabelaUsuarios.php');

  $request = array_map("trim", $_REQUEST);
  $request = filter_var_array($request, [

    'nomeProprio' => FILTER_DEFAULT,
    'sobrenome' => FILTER_DEFAULT,
    'email' => FILTER_VALIDATE_EMAIL,
    'senha' => FILTER_DEFAULT,
    'confirmarSenha' => FILTER_DEFAULT,
    'dataNasc' => FILTER_DEFAULT,
    'visibilidade' => FILTER_DEFAULT,
	  'alertas_email' => FILTER_VALIDATE_BOOLEAN,
    'termosUso' => FILTER_VALIDATE_BOOLEAN,

  ]);

  $nome = $request['nomeProprio'];
  $erros = [];


  if ($nome == false){

    $erros[] = "O nome é inválido";

  } else if ( strlen($nome) < 3 || strlen($nome) > 35){

    $erros[] = "A quantidade de caracteres informada não é válida";

  }


  $sobrenome = $request['sobrenome'];

  if ($sobrenome == false){

    $erros[] = "O nome é inválido";

  } else if ( strlen($sobrenome) < 3 || strlen($sobrenome) > 35){

    $erros[] = "A quantidade de caracteres informada não é válida";

  }



  $email = $request['email'];

  if ($email == false){

    $erros[] = "O e-mail informado é inválido";

  } else if (PesquisaEmail($email) == 1){

    $erros[] = "Este e-mail já está cadastrado";

  }


  $senha = $request['senha'];

  if ($senha == false){

	  $erros[] = "A senha informada é inválida";

  } else if (strlen($senha) < 6 || strlen($senha) > 12) {

	  $erros[] = "A quantidade de caracteres informada não é válida";

  }


  $confirmarSenha = $request['confirmarSenha'];

  if ($confirmarSenha == false){

	  $erros[] = "Confirmação de senha, inválida";

  } else if ($confirmarSenha != $senha){

	  $erros[] = "A senha e a Confirmação de Senha são são iguais";

  }


  $dataNasc = $request['dataNasc'];

  if ($dataNasc == false){

	  $erros[] = "A Data de Nascimento informada é inválida";

  }


  $visibilidade = $request['visibilidade'];

  if ($visibilidade == false){

	  $erros[] = "Uma visibilidade deve ser selecionada ";

  }

  if ($request['alertas_email'] == null){

	  $request['alertas_email'] = false;

  }


  $termosUso = $request['termosUso'];

  if ($termosUso == false){

	  $erros[] = "Você deve aceitar os termos de uso";

  }


  if (count($erros) != 0){

    foreach ($erros as $erro) {

      echo($erro);

    }

  } else {

    InsereUsuario($request);

  }

?>
<html>

  <h1><?php if(count($erros) == 0){echo("Cadastro realizado com Sucesso");} ?></h1>
  <a href="../../index.php">Retornar para Página Inicial</a>

</html>
