  <?php

  function CriaConexãoBd()
  {
    $bd = new PDO('mysql:host=localhost; dbname=fisica_com_higino; charset=utf8',
    'fisica_com_higino',
    'fisica');

      $bd->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);

    return $bd;
  }

  $request = array_map('trim', $_REQUEST);


  $request = filter_var_array(
    $request,
    [
      'usuario' => FILTER_DEFAULT_VARCHAR,
      'email' => FILTER_VALIDATE_EMAIL,
      'senha' => FILTER_VALIDATE_DEFAULT_PASSWORD,
      'confirmaSenha' => FILTER_VALIDATE_DEFAULT_PASSWORD,
      'aceitaTermos'=> FILTER_VALIDATE_BOOLEAN,
    ]
  );
        


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



  function PesquisaEmail($email){

      $bd = CriarConexao();

      $sql = $bd -> prepare('SELECT email FROM usuario WHERE email = :email;');
      $sql -> bindValue(':email', $email);
      $sql -> execute();

      if ($sql -> rowCount() == 0){

        return 0;

      } else {

        return 1;

      }

    }

    function InsereUsuario($novousuario){

      $bd = CriarConexao();

      $sql = $bd -> prepare('

        INSERT INTO usuarios (nome, usuario, email, senha, confirmarsenha, termos_uso) VALUES

        (:nome, :usuario, :email, :senha, :confirmarsenha, :termos_uso);

      ');

      $novousuario['senha'] = password_hash($novousuario['senha'], PASSWORD_DEFAULT);

      $sql -> bindValue(':nome', $novousuario['nomeProprio']);
      $sql -> bindValue(':usuario', $novousuario['usuario']);
      $sql -> bindValue(':email', $novousuario['email']);
      $sql -> bindValue(':senha', $novousuario['senha']);
      $sql -> bindValue(':confirmarsenha', $novousuario['visibilidade']);

      $sql -> bindValue(':termos_uso', $novousuario['termosUso']);

      $sql -> execute();

    }
    
    function ProucuraHash($email){
      
      $bd = CriarConexao();
      
      $sql = $bd -> prepare('SELECT senha FROM usuario WHERE email = :email');
      $sql -> bindValue(':email', $email);
      $sql -> execute();
      
      if($sql -> rowCount() == 0){
        
        return 0;
        
      } else {
              
        $sql = $sql -> fetch();
        return $sql['senha'];
        
      }
      
    }
    
    function RelacionaNome($email){
      
      $bd = CriarConexao();
      
      $sql = $bd -> prepare('SELECT nome FROM usuario WHERE email = :email');
      $sql -> bindValue(':email', $email);
      $sql -> execute();
      
      $sql = $sql -> fetch();
      
      return($sql['nome']);
      
    }


  ?>

  <?php foreach($erros as $msg) { ?>
    <li><?= $msg ?></li>
  <?php } ?>