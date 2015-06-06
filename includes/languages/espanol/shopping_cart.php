<?php
 header('Content-Type: text/html; charset=utf-8');
define('NAVBAR_TITLE', 'Contenido de la Cesta');
define('HEADING_TITLE', 'Que hay en mi Cesta ?');//HEADING_TITLE es lo que sale cuando se elege los productos para comprar.
define('TABLE_HEADING_PRODUCTS', 'Producto(s)');
define('TEXT_CART_EMPTY', '¡Tu Cesta de Compra está vacía!');
define('SUB_TITLE_SUB_TOTAL', 'Subtotal:');
define('SUB_TITLE_TOTAL', 'Total:');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Los productos marcados con ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' no están disponibles en la cantidad que requiere.');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Los productos marcados con ' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' no estan disponibles en la cantidad que requiere.');

define('TEXT_ALTERNATIVE_CHECKOUT_METHODS', '- OR -');
define('TEXT_OR', 'o ');
define('TEXT_REMOVE', 'quitar');
?>
