  <?php

session_start(); 



include_once("../acesso_ao_banco.php");
require_once('../../modelo/tabelausuario.php');

  $request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    [
      'nome' => 'FILTER_DEFAULT_VARCHAR',
      'usuario' => 'FILTER_DEFAULT_VARCHAR',
      'email' => FILTER_VALIDATE_EMAIL,
      'senha' => 'FILTER_VALIDATE_DEFAULT_PASSWORD',
      'confirmaSenha' => 'FILTER_VALIDATE_DEFAULT_PASSWORD',
      'aceitaTermos'=> FILTER_VALIDATE_BOOLEAN,
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

 	 

 	 if (empty($erros))
  
 	{
   	 	$id = InsereAluno($request);
   		$_SESSION['idAlunoConectao'] = $id;

    	header("Location: Cadastro.php");
  	}
  
  
  else
  
  {
    $_SESSION['errosCadastrado'] = $erros;
    header("Location: Cadastro.php");
  }
  	if (mysql_insert_id($bd)) 
  
  	{	
   		$_SESSION['msg'] = "Usuario cadastrado com sucesso";
    	header("Location: Cadastro.php");
  	}
  
  
  else
  
  {
    $_SESSION['errosCadastrado'] = $erros;
    header("Location: Cadastro.php");
  }

  if (count($erros) != 0){

    foreach ($erros as $erro) {

      echo($erro);

    }

  } else {

    InsereUsuario($request);

  }

  
  ?>

  <?php foreach($erros as $msg) { ?>
    <li><?= $msg ?></li>
  <?php } ?>