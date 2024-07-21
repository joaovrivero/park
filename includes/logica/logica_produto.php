<?php
    require_once('conecta.php');
    require_once('funcoes_produto.php');
#CADASTRO Produto
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        
        $array = array($nome, $descricao, $quantidade);
        $retorno=inserirProduto($conexao, $array);
        if(!$retorno)
        {
            $_SESSION['msg']="Erro ao inserir";
        }
        header('location:../../listarProduto.php');
    }

#EDITAR Produto
    if(isset($_POST['editar'])){
    
            $idproduto = $_POST['editar'];
            $array = array($idproduto);
            $Produto=buscarProduto($conexao, $array);
            require_once('../../alterarProduto.php');
    }    
#ALTERAR Produto
    if(isset($_POST['alterar'])){
    
            $idproduto = $_POST['idproduto'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $quantidade = $_POST['quantidade'];
               
            $array = array($nome, $descricao, $quantidade, $idproduto);
            alterarProduto($conexao, $array);
    
            header('location:../../index.php');
    }
#DELETAR Produto
    if(isset($_POST['deletar'])){
        $idproduto = $_POST['deletar'];
        $array=array($idproduto);
        deletarProduto($conexao, $array);

        header('Location:../../index.php');
    }

#PESQUISAR Produto
    if(isset($_POST['pesquisar'])){
        $nome = $_POST['nome'];
        $array=array("%".$nome."%");
        $Produtos=pesquisarProduto($conexao, $array);
        require_once('../../mostrarProduto.php');
    }
#ALTERAR PERFIL
    if(isset($_POST['alterarPerfil'])){
    
            $idproduto = $_POST['idproduto'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $quantidade = $_POST['quantidade'];
               
            $array = array($nome, $descricao, $quantidade, $idproduto);
            alterarProdutoPerfil($conexao, $array);

            header('location:../../alterarPerfil.php');
    }
?>