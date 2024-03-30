<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';


$mail = new PHPMailer(true); // True enables exceptions

try {
    // Configurações do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kengi.ortega.aebel@gmail.com';
    $mail->Password = 'anbqroldhpbjtmvh';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $nome = $_POST['name'];
    $assunto = $_POST['subject'];
    $mensagem = $_POST['message'];

    // Define o remetente, destinatário, assunto e corpo do e-mail
    $mail->addAddress('Paralegal.legalizacao.societario@gmail.com', 'Jessica Carolina');
    $mail->addAddress('kengi.ortega.aebel@gmail.com', 'kengi Ortega');
    $mail->Subject = $assunto;
    $corpo_email = "Email: $email\n";
    $corpo_email .= "Mensagem: $mensagem";

    $mail->Body = $corpo_email;

    // Envia o e-mail
    $mail->send();
    echo 'Mensagem enviada com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
?> 