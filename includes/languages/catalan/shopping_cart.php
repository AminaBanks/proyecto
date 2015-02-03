<?php
/*
  $Id: shopping_cart.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Contingut de la cistella');
define('HEADING_TITLE', 'Qu&egrave; hi ha a la cistella?');
define('TABLE_HEADING_REMOVE', 'Treure');
define('TABLE_HEADING_QUANTITY', 'Quantitat');
define('TABLE_HEADING_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Producte(s)');
define('TABLE_HEADING_TOTAL', 'Total');
define('TEXT_CART_EMPTY', 'La vostra cistella &eacute;s buida!');
define('SUB_TITLE_SUB_TOTAL', 'Subtotal:');
define('SUB_TITLE_TOTAL', 'Total:');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Els productes marcats amb ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' no estan disponibles en la quantitat que demaneu.<br>Modifiqueu la quantitat de productes marcats amb ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ', Gr&agrave;cies');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Els productes marcats amb ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' no estan disponibles en la quantitat que demaneu.<br>Per&ograve; tant se val, podeu comprar els que hi ha disponibles i la resta us els enviarem m&eacute;s tard, o esperar a que la quantitat requerida estigui disponible.');

define('TEXT_ALTERNATIVE_CHECKOUT_METHODS', '- O -');
?>