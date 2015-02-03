<?php
/*
  $Id: checkout_success.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Comanda');
define('NAVBAR_TITLE_2', 'Realitzada amb &Egrave;xit');

define('HEADING_TITLE', 'La vostra comanda ha estat processada!');

define('TEXT_SUCCESS', 'La vostra comanda ha estat processada amb &egrave;xit! Els vostres productes seran fabricats en 10 dies laborables. Al moment d\'entregar-los al transportista, us farem arribar el n&uacute;mero d\'enviament que s\'adjudiqui al paquet');
define('TEXT_NOTIFY_PRODUCTS', 'Si us plau, avisa\'m dels canvis realitzats als productes seleccionats:');
define('TEXT_SEE_ORDERS', 'Podeu veure el vostre històric de comandes a la pàgina <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'El meu compte\'</a> i fent clic sobre l\'enlla&ccedil; <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Mostra\'m les comandes que he realitzat\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Si us plau, dirigiu qualsevol dubte o q&uuml;estió que tingueu a l\'<a href="' . tep_href_link(FILENAME_CONTACT_US) . '">administrador</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Gr&agrave;cies per la vostra confian&ccedil;!');

define('TABLE_HEADING_COMMENTS', 'Afegiu un comentari de la vostra comanda');

define('TABLE_HEADING_DOWNLOAD_DATE', 'Data de caducitat: ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' desc&agrave;rregues restants');
define('HEADING_DOWNLOAD', 'Descarregueu els vostres productes aqu&iacute;:');
define('FOOTER_DOWNLOAD', 'Tamb&eacute; podeu descarregar els vostres productes m&eacute;s tard a \'%s\'');
?>