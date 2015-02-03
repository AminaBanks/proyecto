<?php
/*
  $Id: index.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 'Aquesta &eacute;s la configuraci&oacute; per defecte d\'osCommerce, els productes mostrats aqu&iacute; s&oacute;n &uacute;nicament de demostraci&oacute;, <b>qualsevol compra realitzada no ser&agrave; entregada al client, ni se li cobrar&agrave;</b>. Qualsevol informaci&oacute; que veieu sobre aquests productes ha de ser tractada com a fict&iacute;cia.<br><br>Si voleu descarregar la soluci&oacute; que fa possible aquesta botiga virtual, o si voleu contribuir al projecte de osCommerce, si us plau visiteu <a href="http://www.oscommerce.com" target="_blank"><u>la web de suport de osCommerce</u></a>. Aquesta botiga corre sota la versi&oacute; <font color="#f0000"><b>' . PROJECT_VERSION . '</b></font>.<br><br>Aquest text es pot canviar editant el seg&uuml;ent fitxer, un per cada idioma: [cam&iacute;&nbsp;al&nbsp;cat&agrave;leg]/includes/languages/[language]/default.php.<br><br>Podeu editar-lo manualment, o mitjan&ccedil;ant l\'Eina d\'Administraci&oacute; amb la opci&oacute; Idiomes->[idioma]->Definir, o utilitzant Eines->Administrador de Fitxers.');
define('TABLE_HEADING_NEW_PRODUCTS', 'Nous Productes a %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Properament');
define('TABLE_HEADING_DATE_EXPECTED', 'Llan&ccedil;ament');

if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', 'A veure què tenim aquí');
  define('TABLE_HEADING_IMAGE', '');
  define('TABLE_HEADING_MODEL', 'Model');
  define('TABLE_HEADING_PRODUCTS', 'Productes');
  define('TABLE_HEADING_MANUFACTURER', 'Fabricant');
  define('TABLE_HEADING_QUANTITY', 'Quantitat');
  define('TABLE_HEADING_PRICE', 'Preu');
  define('TABLE_HEADING_WEIGHT', 'Pes');
  define('TABLE_HEADING_BUY_NOW', 'Compra Ara');
  define('TEXT_NO_PRODUCTS', 'No hi ha productes en aquesta categoria.');
  define('TEXT_NO_PRODUCTS2', 'No hi ha productes d\'aquest fabricant.');
  define('TEXT_NUMBER_OF_PRODUCTS', 'N&uacute;mero de Productes: ');
  define('TEXT_SHOW', '<b>Mostra:</b>');
  define('TEXT_BUY', 'Compra\'n 1 \'');
  define('TEXT_NOW', '\' ara');
  define('TEXT_ALL_CATEGORIES', 'Totes');
  define('TEXT_ALL_MANUFACTURERS', 'Tots');
} elseif ($category_depth == 'top') {
  define('HEADING_TITLE', 'Qu&egrave; hi ha de nou per aqu&iacute;?');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Categories');
}
?>
