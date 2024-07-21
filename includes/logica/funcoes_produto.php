<?php
 
    function inserirProduto($conexao,$array){
       try {
            $query = $conexao->prepare("insert into produtos (nome, descricao, quantidade) values (?, ?, ?)");

            $resultado = $query->execute($array);
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    function alterarProduto($conexao, $array){
        try {
            $query = $conexao->prepare("update produtos set nome= ?, descricao = ?, quantidade= ? where idproduto = ?");
            $resultado = $query->execute($array);             
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function alterarProdutoPerfil($conexao, $array){
        try {
            session_start();
            $query = $conexao->prepare("update produtos set nome= ?, descricao = ?, quantidade= ? where idproduto = ?");
            $resultado = $query->execute($array);   
            $_SESSION['nome']=$array[0];         
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



    function deletarProduto($conexao, $array){
        try {
            $query = $conexao->prepare("delete from produtos where idproduto = ?");
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
 
    function listarProduto($conexao){
      try {
        $query = $conexao->prepare("SELECT * FROM produtos");      
        $query->execute();
        $Produtos = $query->fetchAll();
        return $Produtos;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  

    }

     function buscarProduto($conexao,$array){
        try {
        $query = $conexao->prepare("select * from produtos where idproduto=?");
        if($query->execute($array)){
            $Produto = $query->fetch(); //coloca os dados num array $usuario
            return $Produto;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function acessarProduto($conexao,$array){
        try {
        $query = $conexao->prepare("select * from produtos where descricao=?");
        if($query->execute($array)){
            $Produto = $query->fetch(); //coloca os dados num array $Produto
          if ($Produto)
            {  
                return $Produto;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

 function pesquisarProduto($conexao,$array){
        try {
        $query = $conexao->prepare("select * from produto where nome like ?");
        if($query->execute($array)){
            $Produtos = $query->fetchAll(); //coloca os dados num array $Produto
          if ($Produtos)
            {  
                return $Produtos;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }
   ?>