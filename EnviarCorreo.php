<?php
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$body = "Name: " . $name . "<br>Correo: " . $email . "<br>,message: " . $message;  

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'servercovep@gmail.com';                // SMTP username
    $mail->Password   = 'covepserver2019';                      // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('servercovep@gmail.com', $name);
    $mail->addAddress('empresacovep@gmail.com', 'Empresa COVEP');     // Add a recipient
 

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Usuario COVEP';
    $mail->Body    = $body;
    $mail->CharSet =  'UTF-8';
  

    $mail->send();
    echo '<script> 
      alert("Mensaje Enviado");
      window.history.go(-1);
      </script>';
} catch (Exception $e) {
    echo "Error al enviar Mensaje : {$mail->ErrorInfo}";
}
