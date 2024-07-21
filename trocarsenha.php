<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
 include_once('includes/componentes/header.php');
 include_once('includes/logica/funcoes_pessoa.php');
 include_once('includes/logica/conecta.php');
 session_start();
 $codpessoa = $_SESSION['codpessoa'];
 $array = array($codpessoa);
 $pessoa=buscarPessoa($conexao, $array);

?>
    <title>Trocar senha</title>
</head>
<body>
<?php require('includes/componentes/footer.php');?>
<main>
    <section>
    <form action="includes/logica/logica_pessoa.php" method="post">
      <p><label for="senha">Nova Senha: </label><input type="password" name="senha" id="senha"></p>
      <button type="button" onclick="mostrarSenha()">Mostrar Senha</button>  
      <input type="hidden" id='codpessoa' name='codpessoa' value="<?php echo $pessoa['codpessoa']; ?>">
      <p> <input type="submit" id='trocarsenha' name='trocarsenha' value="Alterar">
      </p>        
        </form>

        <script>
            function mostrarSenha() {
               var tipo = document.getElementById("senha");
               if(tipo.type == "password"){
                tipo.type = "text";
               }else{
                tipo.type ="password";
               }
            }
        </script>

    </section>
</main>

</body>
</html>