<?php
//identificação para a chamada da classe

    include_once('includes/logica/conecta.php');
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['enviar'])) 
{
	


$mensagem = $_POST['mensagem'];

$assunto="Promoção do dia";


        require "./PHPMailer/src/PHPMailer.php";
        require "./PHPMailer/src/SMTP.php";
        require "./PHPMailer/src/Exception.php";
        require "./includes/logica/funcoes_pessoa.php";

        $pessoas = listarPessoa($conexao);

        $mail = new PHPMailer();


        $mail->isSMTP();

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];

        $mail->Username = 'dawexemplo2014@gmail.com';
        $mail->Password = 'crelffsizlgmecrr';

        $mail->setFrom('dawexemplo2014@gmail.com','Adm Site');

        foreach($pessoas as $pessoa) {

            $email=$pessoa["email"];
            $nome=$pessoa["nome"];
            $mail->addAddress($email, $nome);
        }

      

        $mail->CharSet = "utf-8";

        $mail->Subject = $assunto;

        $mail->Body = $mensagem;

        $mail->isHTML(true);

        if (!$mail->send()) {
            echo "não funcionou";
        } else {
            echo "funcionou";
        }

}


?>

 <head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <title>Envio de email pela classe PHPMailer</title>


 </head>

 <body>

<form action="enviarPromocao.php" method="post" name="frm_contato">

 


Escreva uma Mensagem: 

<textarea name="mensagem" rows="5" cols="50"></textarea> <br />



<input type="submit" name="enviar" value="ENVIAR" />

</form>


