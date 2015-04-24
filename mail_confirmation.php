<?php

//Load PHPMailer dependencies
require_once 'PHPMailerAutoload.php';/*fichero de la configuration de las version de php */
require_once 'class.phpmailer.php'; /*fichero de la configuration de las version de php */
require_once 'class.smtp.php'; /*fichero de la configuration de las version de php */
header("Content-type: text/html; charset=utf-8");
/* CONFIGURATION */
$crendentials = array(
    'email'     => 'aminebangoura@yahoo.fr',    //Your GMail adress Or yahoo, or cat
    'password'  => 'Aminazo86'               //Your GMail password
    );

/* SPECIFIC TO GMAIL O YAHOO SMTP ES EL PROTOCOLO PARA ENVIAR LOS MAILS*/
$smtp = array(

'host' => 'smtp.mail.yahoo.com', 
'port' => 465,
'username' => $crendentials['email'],
'password' => $crendentials['password'],
'secure' => 'ssl' //SSL or TLS

);

/* TO, SUBJECT, CONTENT */
$to         = 'aminebangoura@yahoo.fr'; //EL MAIL DE LA PERSONA RESPONSABLE DE GESTIONAR LOS PEDIDOS
$subject    = 'Mail informativo: Nova Compra de Soci !!!'; //EL CONTENIDO DE LA INFORMACION 
$content    = 'Anar a l´administrador per veure la nova compra.'; //CAMBIAR ESTAS LINEAS PARA EL CONTENIDO DEL MAIL 



$mailer = new PHPMailer();

//SMTP Configuration
$mailer->isSMTP();
$mailer->SMTPAuth   = true; //We need to authenticate
$mailer->Host       = $smtp['host']; //el host
$mailer->Port       = $smtp['port'];//la puerta
$mailer->Username   = $smtp['username']; //el username
$mailer->Password   = $smtp['password']; //recuperar la contraseña
$mailer->SMTPSecure = $smtp['secure']; //La seguridad

//Now, send mail :
//From - To :
$mailer->From       = $crendentials['email'];//RECUPERAR EL MAIL
$mailer->FromName   = 'PROIDE'; //Optional // nombre de la ong
$mailer->addAddress($to);  // Add a recipient /n del mail / direccio

//Subject - Body :
$mailer->Subject        = $subject;
$mailer->Body           = $content;
$mailer->isHTML(true); //Mail body contains HTML tags

//Essayer si le mail est envoyer :
if(!$mailer->send()) {
    echo 'Error sending mail : ' . $mailer->ErrorInfo;
} else {
    //echo 'Message sent !';
}

?>