<?php
/*
  $Id: shopping_cart.php $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/
header('Content-Type: text/html; charset=utf-8');
define('NAVBAR_TITLE', 'Contenu du panier');
define('HEADING_TITLE', 'Le contenu de mon panier.');//HEADING_TITLE

define('TABLE_HEADING_PRODUCTS', 'Produit(s)');

define('TEXT_CART_EMPTY', 'Votre panier est vide.');
define('SUB_TITLE_SUB_TOTAL', 'Sous-total :');
define('SUB_TITLE_TOTAL', 'Total :');

define('TEXT_OR', 'ou &nbsp;');
define('TEXT_REMOVE', 'supprimer.');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Les produits marqués ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantité désirée.<br />Merci de corriger la quantité des articles marqués (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ')');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Les produits marqués avec ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantité désirée.<br />Vous pouvez néanmoins les acheter, ils vous seront délivrés dès leur disponibilité.');
define('TEXT_ALTERNATIVE_CHECKOUT_METHODS', '- OU -');

?>