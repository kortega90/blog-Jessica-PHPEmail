<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $assunto = $_POST['subject'];
    $mensagem = $_POST['message'];

    $para = 'kengi.ortega.aebel@gmail.com'; // Substitua pelo seu endereço de e-mail

    // Monta o corpo do e-mail
    $mensagem_email = "Nome: $nome\n";
    $mensagem_email .= "E-mail: $email\n";
    $mensagem_email .= "Assunto: $assunto\n";
    $mensagem_email .= "Mensagem:\n$mensagem\n";

    // Define os cabeçalhos do e-mail
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envia o e-mail
    if (mail($para, $assunto, $mensagem_email, $headers)) {
        echo 'Mensagem enviada com sucesso!';
    } else {
        echo 'Erro ao enviar mensagem. Por favor, tente novamente mais tarde.';
    }
}
?>