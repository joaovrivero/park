<?php

include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');

require_once('email/envia_email.php');




  if(!empty($_POST)){
    echo 'entrou';
    $array = array($_POST['email']);
    $user = acessarPessoa($conexao,$array);

    if($user){
      echo 'entrou';

      $chave = sha1(uniqid( mt_rand(), true));
 
        $array = array($chave, $user['codpessoa']);
        $confirmar = confirmarsenha($conexao, $array);

        if ($confirmar){

          $link="<a href='localhost/park/recuperar.php?utilizador=".$user['codpessoa']."&chave=".$chave."'> Clique aqui para confirmar seu cadastro </a>";

          $mensagem.="Email de Confirmação <br>".$link."</td></tr>";

          $assunto = 'confirmar senha';

          $email = $user['email'];
          $nome = $user['nome'];
          $retorno= enviaEmail($email,$nome,$mensagem,$assunto);

        }
      }
	}
  
?>

<h1>Recuperar Senha </h1>

<form method="post">
  <label for="email">E-mail:</label>
  <input type="text" name="email" id="email" />
  <input type="submit" value="Recuperar" />
</form>
<?php
  
?>