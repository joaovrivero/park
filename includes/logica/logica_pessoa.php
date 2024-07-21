<?php
 session_start();
    require_once('conecta.php');
    require_once('funcoes_pessoa.php');
    require_once('../../email/envia_email.php');
#CADASTRO PESSOA
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $array = array($nome, $email, $cpf, $senha);
        $retorno=inserirPessoa($conexao, $array);
        if($retorno)
        {
               $hash=md5($email);
               $link="<a href='localhost/park/valida_email.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
              $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";
              $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";

               $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
               $assunto="Confirme seu cadastro";

               $retorno= enviaEmail($email,$nome,$mensagem,$assunto);
        
               $_SESSION["msg"] = "Valide o Cadastro no email";

        }
        else
        {
               $_SESSION["msg"] = 'Erro ao inserir <br>';
        }
        
        header('location:../../login.php');
    }
#ENTRAR
    if(isset($_POST['entrar'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $array = array($email, $senha);
        $pessoa = acessarPessoa($conexao,$array,$senha);
        if($pessoa){
           
            $_SESSION['logado'] = true;
            $_SESSION['codpessoa'] = $pessoa['codpessoa'];
            $_SESSION['nome'] = $pessoa['nome'];
            $data = date("m-d-Y");  
            $hora = date("H:i:s");

           
          header('location:../../index.php');
        }
        else{
            
            $_SESSION['msg']="Usuário ou senha inválidos";
            header('location:../../login.php');
        }
    }

#SAIR
    if(isset($_POST['sair'])){
            
            session_destroy();
            header('location:../../login.php');
    }

#EDITAR PESSOA
    if(isset($_POST['editar'])){
    
            $codpessoa = $_POST['editar'];
            $array = array($codpessoa);
            $pessoa=buscarPessoa($conexao, $array);
            require_once('../../alterarPessoa.php');
    }    
#ALTERAR PESSOA
    if(isset($_POST['alterar'])){
    
            $codpessoa = $_POST['codpessoa'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];    
            $array = array($nome, $email, $cpf, $senha, $codpessoa);
            alterarPessoa($conexao, $array);
    
            header('location:../../index.php');
    }
#DELETAR PESSOA
    if(isset($_POST['deletar'])){
        $codpessoa = $_POST['deletar'];
        $array=array($codpessoa);
        deletarPessoa($conexao, $array);

        header('Location:../../index.php');
    }

#PESQUISAR PESSOA
    if(isset($_POST['pesquisar'])){
        $nome = $_POST['nome'];
        $array=array("%".$nome."%");
        $pessoas=pesquisarPessoa($conexao, $array);
        require_once('../../mostrarPessoa.php');
    }
#ALTERAR PERFIL
    if(isset($_POST['alterarPerfil'])){
    
            $codpessoa = $_POST['codpessoa'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $senha = $_POST['senha'];    
            $array = array($nome, $email, $cpf, $senha, $codpessoa);
            alterarPessoaPerfil($conexao, $array);

            header('location:../../alterarPerfil.php');
    }
?>