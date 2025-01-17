<!DOCTYPE html>
<html>

<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');
?>
   <title>Listar Produto</title>
</head>
<body>  
<body>

<main>
         <h2> Usuário Logado:  <?php echo $_SESSION['nome']; ?>  </h2>
         <h3> Pesquisa de Produtos </h3>
    <?php

        if(empty($pessoas)){
            ?>
                <section>
                    <p>Não há produtos cadastrados.</p>
                </section>
            <?php
        }
        else
        {
        foreach($pessoas as $pessoa){
                 
            ?>
                <section>
                    <p>Nome: <?php echo $pessoa['nome']; ?></p>
                    <p>descricao <?php echo $pessoa['descricao']; ?></p>
                    <p>quantidade: <?php echo $pessoa['quantidade']; ?></p>
                    <p>Imagem: <img src="../../imagens/<?php echo $pessoa['imagem'];?>" width='100px' height='100px'/></p>
                    
                    <form action="/park/includes/logica/logica_produto.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $pessoa['idproduto']; ?>"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $pessoa['idproduto']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                    </form>
                    <br><br>                                                          
                </section>
            <?php
        }
    }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
<script type="text/javascript">
    function confirma_excluir()
    {
        resp=confirm("Confirma Exclusão?")

        if (resp==true)
        {

            return true;
        }
        else
        {
            return false;

        }

    }

</script>
</html>