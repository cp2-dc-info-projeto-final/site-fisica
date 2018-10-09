<?php

  require_once('../Modelo/TabelaUsuarios.php');

  $request = array_map("trim", $_REQUEST);
  $request = filter_var_array($request, 
  
    ['email' => FILTER_VALIDATE_EMAIL,
     'senha' => FILTER_DEFAULT]
  
  );
  
  $email = $request['email'];
  $senha = $request['senha'];
  
  $erros = [];
  
  if ($email == false){
    
    $erros[] = 'E-mail não informado ou inválido';
    
  } else
  
  if ($senha == false){
    
    $erros[] = 'Senha não informada ou inválida';
    
  } else
  
  if (PesquisaEmail($email) == 0){
    
    $erros[] = 'O E-mail informado não está cadastrado';
    
  }
    
  if (empty($erros) == true){
    
    $hash = ProucuraHash($email);
    
    if (password_verify($senha, $hash) == false){
      
      $erros[] = 'E-mail e senha não correspondem';
      
    } else {
      
      session_start();
      
      $_SESSION['emailLogado'] = $email;
      
      header('Location: ../Visao/perfilUsuario.php    ');
      exit();
      
    }
  
  }
  
  session_start();
  
  $_SESSION['erros'] = $erros;
  header('Location: ../.php');

?>