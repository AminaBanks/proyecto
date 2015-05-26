<?php

//Load PHPMailer dependencies

require_once 'PHPMailerAutoload.php';/*fichero de la configuration de las version de php */
require_once 'class.phpmailer.php'; /*fichero de la configuration de las version de php */
require_once 'class.smtp.php'; /*fichero de la configuration de las version de php */

/* CONFIGURATION NECESITARE LA PARTE DEL CLIENTE  QUE SEA EN POP O EN IPAM Y TAMBIEN EN SMTP */
$crendentials = array(
    'email'     => 'aminata.bangoura@gracia.lasalle.cat',		//'secretaria@fundacioproide.org',//Your GMail adress Or yahoo, or cat
    'password'  => 'BoboSylla86'				//'29072010' //contraseña de helena              //Your
  );

/* SPECIFIC TO GMAIL O YAHOO SMTP ES EL PROTOCOLO PARA ENVIAR LOS MAILS*/
$smtp = array(

'host' => 'smtp.office365.com', //, SI ES CON EL MAIL OUTLOUK PERO NO FUNCIONA smtp.mail.yahoo.com'', //HAY QUE CONFIGURAR EL SMTP PARA CADA PROTOCOLO DE MAIL SI ES GMAIL 
'port' =>  587, //465, // 587 Y LA PUERTA ES ESTA.,
'username' => $crendentials['email'],
'password' => $crendentials['password'],
'secure' => 'tls'		//'' //SSL or TLS Y ES TLS PERO TAMPOCO FUNCIONA .

);

/* TO, SUBJECT, CONTENT */
$to         = 'aminata.bangoura@gracia.lasalle.cat';			//'secretaria@fundacioproide.org'; //EL MAIL DE LA PERSONA RESPONSABLE DE GESTIONAR LOS PEDIDOS
$subject    = 'Mail informativo: Nova Compra de Soci !!!'; //EL CONTENIDO DE LA INFORMACION 
$content    = 'Anar a l\'administrador per veure la nova compra.'; //CAMBIAR ESTAS LINEAS PARA EL CONTENIDO DEL MAIL 



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
$mailer->addAddress($to);  // Add a recipient /n del mail / ADDRESS

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