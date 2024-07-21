<h1>Alterar password</h1>
<?php

 $connect = mysqli_connect('localhost', 'root', '', 'park');

  $user = $_GET['utilizador'];
  $hash = $_GET['chave'];

  $q = mysqli_query($connect, "SELECT * FROM pessoa WHERE codpessoa = '$user' AND confirmacao = '$hash'");


  if( mysqli_num_rows($q) == 1 ){

    // os dados estão corretos: eliminar o pedido e permitir alterar a password
    $altera=mysqli_query($connect, "UPDATE pessoa SET confirmacao = '' WHERE codpessoa = '$user' AND confirmacao = '$hash'");

    echo 'Sucesso! (Mostrar formulário de alteração de password aqui)';   
    ?>


    <section>
    <form action="includes/logica/logica_pessoa.php" method="post">
      <p><label for="senha">Nova Senha: </label><input type="password" name="senha" id="senha"></p>
      <button type="button" onclick="mostrarSenha()">Mostrar Senha</button>  
      <input type="hidden" id='codpessoa' name='codpessoa' value="<?php echo $user; ?>">
      <p> <input type="submit" id='trocarsenha2' name='trocarsenha2' value="Alterar">
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

    <?php

 
  } else {
    echo '<p>Não é possível alterar a password: dados incorretos</p>';
 
  }
 
?>