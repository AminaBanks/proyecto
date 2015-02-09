<?php
/*
  $Id: index.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('TEXT_MAIN', '');
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
  define('HEADING_TITLE', 'Benvingut a la p&#x000E0;gina Web de comer&#x000E7; electr&#x000F2;nic Solidaritat de Proide');
} elseif ($category_depth == 'nested') {
  define('HEADING_TITLE', 'Categories');
}
?>
