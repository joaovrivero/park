<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
 include_once('includes/componentes/header.php');
?>
    <title>Alterar Produto</title>
</head>
<body>

<main>
    <section>
    <form action="logica_produto.php" method="post">
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $pessoa['nome']; ?>"></p>
      <p><label for="descricao">descricao: </label><input type="text" name="descricao" id="descricao" value="<?php echo $pessoa['descricao']; ?>"></p>
      <p><label for="quantidade">quantidade: </label><input type="text" name="quantidade" id="quantidade" value="<?php echo $pessoa['quantidade']; ?>"></p>
      
      <input type="hidden" id='idproduto' name='idproduto' value="<?php echo $pessoa['idproduto']; ?>">
      <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
      </p>        
        </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>