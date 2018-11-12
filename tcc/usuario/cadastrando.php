
<?php
require_once('acesso_ao_banco.php');
function InsereUsuario($novousuario)
  {
    $bd = CriarConexao();
    $sql = $bd -> prepare('INSERT INTO usuarios(nome, usuario, email, senha) VALUES (:valnome, :valusuario, :valemail, :valsenha)');

    $hash = password_hash($novousuario['senha'], PASSWORD_DEFAULT);

    $sql -> bindValue(':valnome', $novousuario['nome']);
    $sql -> bindValue(':valusuario', $novousuario['usuario']);
    $sql -> bindValue(':valemail', $novousuario['email']);
    $sql -> bindValue(':valsenha', $hash);
    $sql -> execute();

    return $bd->lastInsertid();

  }

  $request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    [
      'nome' => 'FILTER_DEFAULT',
      'usuario' => 'FILTER_DEFAULT',
      'email' => 'FILTER_VALIDATE_EMAIL',
      'senha' => 'FILTER_DEFAULT',
      'confirmasenha' => 'FILTER_DEFAULT',
      'termo'=> 'FILTER_DEFAULT'
    ]
  );
        
$erros = [];
  $nome = $request['nome'];
    if ($nome == false)
    {
      $erros[] = "O campo nome deve ser preenchido.";
    }
     if (strlen($nome < 6) || 16 < strlen($nome))
    {
      $erros[] = "A quantidade do campo nome deve ser entre 3 e 10.";
    }

  
  $usuario = $request['usuario'];
    if ($nome == false)
    {
      $erros[] = "O campo usuário deve ser preenchido.";
    }
     if (strlen($nome < 6) || 16 < strlen($nome))
    {
      $erros[] = "A quantidade do campo usuário deve ser entre 3 e 10.";
    }


  $email = $request['email'];
    if ($email == false)
    {
      $erros[] = "O campo email deve ser preenchido.";
    }
     if (strlen($email < 16) || 30 < strlen($email))
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
     if (strlen($senha < 7) || 12 < strlen($senha))
    {
      $erros[] = "A quantidade do campo senha deve ser entre 3 e 35.";
    }


  $confirmaSenha = $request['confirmasenha'];
    if ($confirmaSenha == false)
    {
      $erros[] = "O campo confirmar senha deve ser preenchido.";
    }
     if (strlen($confirmaSenha < 7) || 12 < strlen($confirmaSenha))
    {
      $erros[] = "A quantidade do campo confirmarsenha deve ser entre 7 e 12.";
    }
     if ($confirmaSenha != $senha)
    {
      $erros[] = "A senha informada e diferente da de cima";
    }


  $aceitaTermos = $request['termo'];
    if ($aceitaTermos == false)
    {
      $erros[] = "Deve-se aceitar os termos para poder aceitar.";
    }

 	 
session_start();
if (empty($erros))
{
	$id = InsereAluno($request);
   	$_SESSION['idAlunoConectao'] = $id;
   	header('Location: ../../paginInc.html');	
}

else
{
   $_SESSION['errosCadastrado'] = $erros;
}

?>
