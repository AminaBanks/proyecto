<?php

//Load PHPMailer dependencies
require_once 'PHPMailerAutoload.php';/*fichero de la configuration de las version de php */
require_once 'class.phpmailer.php';
require_once 'class.smtp.php';

/* CONFIGURATION */
$crendentials = array(
    'email'     => 'aminebangoura@yahoo.fr',    //Your GMail adress Or yahoo, or cat
    'password'  => 'Aminazo86'               //Your GMail password
    );

/* SPECIFIC TO GMAIL SMTP */
$smtp = array(

'host' => 'smtp.mail.yahoo.com', 
'port' => 465,
'username' => $crendentials['email'],
'password' => $crendentials['password'],
'secure' => 'ssl' //SSL or TLS

);

/* TO, SUBJECT, CONTENT */
$to         = 'aminebangoura@yahoo.fr'; //The 'To' field
$subject    = 'Mail informativo: Nueva compra!!!';
$content    = 'Ir al administrador para ver la nueva compra.'; //CAMBIAR ESTAS LINEAS PARA EL CONTENIDO DEL MAIL 



$mailer = new PHPMailer();

//SMTP Configuration
$mailer->isSMTP();
$mailer->SMTPAuth   = true; //We need to authenticate
$mailer->Host       = $smtp['host'];
$mailer->Port       = $smtp['port'];
$mailer->Username   = $smtp['username'];
$mailer->Password   = $smtp['password'];
$mailer->SMTPSecure = $smtp['secure']; 

//Now, send mail :
//From - To :
$mailer->From       = $crendentials['email'];
$mailer->FromName   = 'PROIDE'; //Optional
$mailer->addAddress($to);  // Add a recipient

//Subject - Body :
$mailer->Subject        = $subject;
$mailer->Body           = $content;
$mailer->isHTML(true); //Mail body contains HTML tags

//Essayer si le mail est envoyer :
if(!$mailer->send()) {
    echo 'Error sending mail : ' . $mailer->ErrorInfo;
} else {
    echo 'Message sent !';
}

?>