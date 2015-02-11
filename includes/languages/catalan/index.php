<?php
/*
  $Id: index.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', 'Et donem la benvinguda a la p&#x000E0;gina web de comer&#x000E7; Solidaritat Proide per ajudar contra la pobresa als pa&#x000EF;sos del tercer m&#x000F3;n, sin&#x000F3; tamb&#x000E9; a Espanya');
define('TABLE_HEADING_NEW_PRODUCTS', 'Nous Productes a %s');
define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Properament');
define('TABLE_HEADING_DATE_EXPECTED', 'Llan&ccedil;ament');

if ( ($category_depth == 'products') || (isset($HTTP_GET_VARS['manufacturers_id'])) ) {
  define('HEADING_TITLE', 'A veure qu tenim aqu’');
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
