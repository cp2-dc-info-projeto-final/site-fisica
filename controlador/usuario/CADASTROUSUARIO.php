  <?php

require_once('../Modelo/TabelaUsuarios.php');

  $request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    [
      'nome' => FILTER_DEFAULT_VARCHAR
      'usuario' => FILTER_DEFAULT_VARCHAR,
      'email' => FILTER_VALIDATE_EMAIL,
      'senha' => FILTER_VALIDATE_DEFAULT_PASSWORD,
      'confirmaSenha' => FILTER_VALIDATE_DEFAULT_PASSWORD,
      'aceitaTermos'=> FILTER_VALIDATE_BOOLEAN,
    ]
  );
        

  $nome = $request['nomePróprio'];
    if ($nome == false)
    {
      $erros[] = "A quantidade de caracteres informada não é válida.";
    }
    else if (strlen($nome < 6) || 16 < strlen($nome))
    {
      $erros[] = "A quantidade deve ser entre 3 e 10.";
    }

  
  $usuario = $request['nomePróprio'];
    if ($nome == false)
    {
      $erros[] = "A quantidade de caracteres informada não é válida.";
    }
    else if (strlen($nome < 6) || 16 < strlen($nome))
    {
      $erros[] = "A quantidade deve ser entre 3 e 10.";
    }


  $email = $request['email'];
    if ($qtde == false)
    {
      $erros[] = "A quantidade de caracteres informada não é válida.";
    }
    else if (strlen($email < 16) || 30 < strlen($email))
    {
      $erros[] = "";
    }


  $senha = $request['senha'];
    if ($qtde == false)
    {
      $erros[] = "A quantidade de caracteres informada não é válida.";
    }
    else if (strlen($senha < 7) || 12 < strlen($senha))
    {
      $erros[] = "A quantidade deve ser entre 3 e 35.";
    }


  $confimaSenha = $request['confirmaSenha'];
    if ($qtde == false)
    {
      $erros[] = "A quantidade de caracteres informada não é válida.";
    }
    else if (strlen($confimaSenha < 7) || 12 < strlen($confimaSenha))
    {
      $erros[] = "A quantidade deve ser entre 3 e 35.";
    }


  $aceitaTermos = $request['aceitaTermos'];
    if ($qtde == false)
    {
      $erros[] = "Deve-se aceitar os termos para poder aceitar.";
    }



 

   
  ?>

  <?php foreach($erros as $msg) { ?>
    <li><?= $msg ?></li>
  <?php } ?>