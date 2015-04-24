<?php


define('NAVBAR_TITLE_1', 'Entra');
define('NAVBAR_TITLE_2', 'Contrasenya oblidada');

define('HEADING_TITLE', 'He oblidat la meva contrasenya!');

define('TEXT_MAIN', 'Si heu oblidat la vostra contrasenya, entreu la vostra envieu un correu a Proide (el correo de la secretaria)');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', '<font color="#ff0000"><b>NOTA:</b></font> Aquesta adre??a no est&agrave; a la nostra base de dades, torneu-ho a intentar si us plau.');

define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Contrasenya Nova');
define('EMAIL_PASSWORD_REMINDER_BODY', 'S\'ha demanat una contrasenya nova des de ' . $REMOTE_ADDR . '.' . "\n\n" . 'La vostra contrasenya nova per \'' . STORE_NAME . '\' &eacute;s:' . "\n\n" . '   %s' . "\n\n");

define('SUCCESS_PASSWORD_SENT', 'Hem enviat una contrasenya nova a la vostra adre&ccedil;a d\'e-mail');
?>
