<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

$phpMailer = new PHPMailer();
var_dump($phpMailer instanceof PHPMailer);


/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    $mail = new PHPMailer(true);

    //CONFIG
    $mail->isSMTP();
    $mail->setLanguage("br");
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'utf-8';

    //AUTH
    $mail->Host = "smtp.sendgrid.net";
    $mail->Username = "apikey";
    $mail->Password = "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";
    $mail->Port = "587";

    //MAIL
    $mail->setFrom("cursos@upinside.com.br", "Robson V. Leite");
    $mail->Subject = "Este é meu envio via componente no FSPHP";
    $mail->msgHTML("<h1>Olá mundo!</h1><p>Esse é meu primeiro disparo de e-mail.</p>");

    //SEND
    $mail->addAddress("robsonvleite@gmail.com", "Robson Leite");
    $send = $mail->send();

    var_dump($send);
} catch (MailException $exception) {
    echo message()->error($exception->getMessage());
}



