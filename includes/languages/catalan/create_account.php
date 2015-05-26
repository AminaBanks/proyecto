<?php

define('NAVBAR_TITLE_1', 'Crea un Compte');
define('NAVBAR_TITLE_2', 'Proc&eacute;s');
define('HEADING_TITLE', 'Dades del Meu Compte');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTA:</b></font></small> Si ja heu passat per aquest proc&eacute;s i teniu un compte, si us plau <a href="%s"><u>entreu-hi</u></a>.');

define('EMAIL_SUBJECT', 'Benvinguts a ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Benvingut ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Benvinguda ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Benvingut ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'Us donem la benvinguda a <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Ara podeu disfrutar dels <b>serveis</b> que us oferim. Alguns d\'aquests serveis s&oacute;n:' . "\n\n" . '<li><b>Cistella Permanent</b> - Qualsevol producte afegit a la vostra cistella hi romandr&agrave; fins que l\'elimineu, o fins que realitzeu la compra.' . "\n" . '<li><b>Llibre d\'Adreces</b> - Podem enviar els vostres productes a altres adreces a part de la vostra! Aix&ograve; &eacute;s perfecte per enviar regals d\'aniversari directament a la persona que fa anys.' . "\n" . '<li><b>Historial de Comandes</b> - Vegeu la relaci&oacute; de compres que heu realitzat amb nosaltres.' . "\n" . '<li><b>Comentaris</b> - Compartiu la vostra opini&oacute; sobre els productes amb altres clients.' . "\n\n");
define('EMAIL_CONTACT', 'Per qualsevol consulta sobre els nostres serveis, si us plau, escriviu-nos a: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Nota:</b> Aquesta adre&ccedil;a ha estat subministrada per un dels nostres clients. Si vost&eacute; no s\'ha subscrit com a client, si us plau, comuniquins-ho a ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('IMAGE_BUTTON_EMAIL', 'Enviar Correu');
define ('NEW_CUSTOMER', 'Nou Soci');
define ('MESSAGE_CLIENT','Estimat Soci, <br>Dins de 24 hores, rebrà un correu electrònic amb les seves dades per iniciar sessió en artesaniafundacioproide.org<br> Gràcies <br>PROIDE');
?>
