  <?php

require_once('../../modelo/tabelausuario.php');

$erros = [];

  $request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    [
      'nome' => 'FILTER_DEFAULT_VARCHAR',
      'usuario' => 'FILTER_DEFAULT_VARCHAR',
      'email' => 'FILTER_VALIDATE_EMAIL',
      'senha' => 'FILTER_VALIDATE_DEFAULT_PASSWORD',
      'confirmaSenha' => 'FILTER_VALIDATE_DEFAULT_PASSWORD',
      'aceitaTermos'=> 'FILTER_VALIDATE_BOOLEAN',
    ]
  );
        

  $nome = $request['nome'];
    if ($nome == false)
    {
      $erros[] = "O campo nome deve ser preenchido.";
    }
    else if (strlen($nome < 6) || 16 < strlen($nome))
    {
      $erros[] = "A quantidade do campo nome deve ser entre 3 e 10.";
    }

  
  $usuario = $request['usuario'];
    if ($nome == false)
    {
      $erros[] = "O campo usuário deve ser preenchido.";
    }
    else if (strlen($nome < 6) || 16 < strlen($nome))
    {
      $erros[] = "A quantidade do campo usuário deve ser entre 3 e 10.";
    }


  $email = $request['email'];
    if ($email == false)
    {
      $erros[] = "O campo email deve ser preenchido.";
    }
    else if (strlen($email < 16) || 30 < strlen($email))
    {
      $erros[] = "A quantidade do campo email deve ser entre 3 e 10.";
    }
    else if (BuscaUsuárioPorEmail($email) != false)
	{
		$erros[] = "Já existe um usuário cadastrado com esse e-mail";
	}


  $senha = $request['senha'];
    if ($senha == false)
    {
      $erros[] = "O campo senha deve ser preenchido.";
    }
    else if (strlen($senha < 7) || 12 < strlen($senha))
    {
      $erros[] = "A quantidade do campo senha deve ser entre 3 e 35.";
    }


  $confirmaSenha = $request['confirmaSenha'];
    if ($confirmaSenha == false)
    {
      $erros[] = "O campo confirmar senha deve ser preenchido.";
    }
    else if (strlen($confirmaSenha < 7) || 12 < strlen($confirmaSenha))
    {
      $erros[] = "A quantidade do campo confirmarsenha deve ser entre 3 e 35.";
    }
    else if ($confirmaSenha =! $senha)
    {
      $erros[] = "A senha informada e diferente da de cima";
    }


  $aceitaTermos = $request['aceitaTermos'];
    if ($aceitaTermos == false)
    {
      $erros[] = "Deve-se aceitar os termos para poder aceitar.";
    }

 	 session_start(); 


 	 if (empty($erros))
  
 	{
   	 	$id = InsereAluno($request);
   		$_SESSION['idAlunoConectao'] = $id;

    	
  	}
  else
  
  {
    $_SESSION['errosCadastrado'] = $erros;
    
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
 