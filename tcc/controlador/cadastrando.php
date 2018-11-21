<?php
require_once('../modelo/acesso_ao_banco.php');
require_once('../modelo/tabelausuario.php');


session_start();


  $request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    [
      'nome' => 'FILTER_DEFAULT',
      'usuario' => 'FILTER_DEFAULT',
      'email' => 'FILTER_VALIDATE_EMAIL',
      'senha' => 'FILTER_DEFAULT',
      'confirmasenha' => 'FILTER_DEFAULT',
      'termo'=> 'FILTER_DEFAULT',
      'matricula' => 'FILTER_DEFAULT'
    ]
  );
        
$erros = [];
  $nome = $request['nome'];
    if ($nome == false)
    {
      $erros[] = "O campo nome deve ser preenchido.";
    }
     if (strlen($nome) < 3 || strlen($nome )>255)
    {
      $erros[] = "A quantidade do campo nome deve ser entre 3 e 255.";
    }

  
  $usuario = $request['usuario'];
    if ($usuario == false)
    {
      $erros[] = "O campo usuário deve ser preenchido.";
    }
     if (strlen($usuario) < 6 || strlen($usuario) >16)
    {
      $erros[] = "A quantidade do campo usuário deve ser entre 6 e 16.";
    }
    else if (PesquisaUsuario($usuario) != false )
    {
      $erros[] = "O usuario ja foi cadastrado";
    }


  $email = $request['email'];
    if ($email == false)
    {
      $erros[] = "O campo email deve ser preenchido.";
    }
   
    else if (BuscaUsuarioPorEmail($email) != false)
	   {
		    $erros[] = "Já existe um usuário cadastrado com esse e-mail";
      }


  $senha = $request['senha'];
    if ($senha == false)
    {
      $erros[] = "O campo senha deve ser preenchido.";
    }
     if (strlen($senha) < 7 ||  strlen($senha )>16)
    {
      $erros[] = "A quantidade do campo senha deve ser entre 7 e 16.";
    }


  $confirmaSenha = $request['confirmasenha'];
    if ($confirmaSenha == false)
    {
      $erros[] = "O campo confirmar senha deve ser preenchido.";
    }
     if (strlen($confirmaSenha )< 7 || strlen($confirmaSenha ) >16)
    {
      $erros[] = "A quantidade do campo confirmarsenha deve ser entre 7 e 16.";
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



if (array_key_exists('idUsuárioConectado' , $_SESSION) )
{
  $id = $_SESSION['idUsuárioConectado'];
  $master = BuscaUsuarioPorId($id);
  if ($master['matricula'] != null) 
  {
    $matricula = $request['matricula'];
    if ($matricula == false)
    {
      $erros[] = "Deve-se preencher o campo matricula.";
    }
    if (strlen($matricula)< 7 || strlen($matricula) >9)
    {
      $erros[] = "A quantidade do campo matricula deve ser entre 7 e 9.";
    }
  }
  else 
  {
    $request['matricula'] = null;
  }
}
else 
{
  $request['matricula'] = null;
}

// Ver se já tem usuário logado e se ele é o professor
// Se SIM: Faz o código abaixo.
// Se NÃO:// $request['matricula'] = null

/*    $matricula = $request['matricula'];
    if ($aceitaTermos == false)
    {
      $erros[] = "Deve-se preencher o campo matricula.";
    }
    if (strlen($matricula)< 7 || strlen($matricula) >9)
    {
      $erros[] = "A quantidade do campo matricula deve ser entre 7 e 9.";
    }
*/
 	 
if (empty($erros))
{
	$id = InsereAluno($request);
   	$_SESSION['idUsuárioConectado'] = $id;
    $_SESSION['username'] = $usuario;
   	header('Location: ../paginInc.php');	
}

else
{
   $_SESSION['errosCadastrado'] = $erros;
    header('Location: ../Cadastro.php');
  }

  
?>
