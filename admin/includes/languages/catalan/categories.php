<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/


define ('HEADING_TITLE', 'Categories / Productes');
define ('HEADING_TITLE_SEARCH', 'Cerca:');
define ('HEADING_TITLE_GOTO', 'Ir a:');
define ('TEXT_CATEGORIES_NAME','Nom de la categoria');
define ('TABLE_HEADING_ID', 'ID');
define ('TABLE_HEADING_CATEGORIES_PRODUCTS ',' Categories / Productes ');
define ('TABLE_HEADING_ACTION', 'Acció');
define ('TABLE_HEADING_STATUS ','Estat ');

define ('TEXT_NEW_PRODUCT','Nou Producte en & quot;% s & quot;');
define ('TEXT_CATEGORIES', 'Categories:');
define ('TEXT_SUBCATEGORIES', 'Subcategories:');
define ('TEXT_PRODUCTS', 'productes');
define ('TEXT_PRODUCTS_PRICE_INFO', 'Preu:');
define ('TEXT_PRODUCTS_TAX_CLASS', 'Classe d&#39Impost:');
define ('TEXT_PRODUCTS_AVERAGE_RATING', 'Mitjana:');
define ('TEXT_PRODUCTS_QUANTITY_INFO', 'Quantitat:');
define ('TEXT_DATE_ADDED', 'Data d&#39alta:');
define ('TEXT_DATE_AVAILABLE', 'Data Disponible:');
define ('TEXT_LAST_MODIFIED', 'Última modificació:');
define('TEXT_IMAGE_NONEXISTENT', 'IMATGE NO EXISTEIX');
define ('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Si us plau, inseriu una nova categoria o producte en aquest nivell.');
define ('TEXT_PRODUCT_MORE_INFORMATION', 'Per obtenir més informació, si us plau visiti aquest productes <a href="http://%s" target="blank"> <u> pàgina </ u> </a>.');
define ('TEXT_PRODUCT_DATE_ADDED', 'Aquest producte és al nostre catàleg des de% s.');
define ('TEXT_PRODUCT_DATE_AVAILABLE', 'Aquest producte estarà disponible el% s.');

define ('TEXT_EDIT_INTRO', 'Si us plau, feu els canvis necessaris');
define ('TEXT_EDIT_CATEGORIES_ID', 'de Categoria:');
define ('TEXT_EDIT_CATEGORIES_NAME ',' Nom de la categoria:');
define ('TEXT_EDIT_CATEGORIES_IMAGE', 'Categoria d&#39imatge:');
define ('TEXT_EDIT_SORT_ORDER', 'Ordre de Classificació:');

define ('TEXT_INFO_COPY_TO_INTRO', 'Si us plau, escolliu una nova categoria que voleu copiar aquest producte');
define ('TEXT_INFO_CURRENT_CATEGORIES', 'Categories actuals:');

define ('TEXT_INFO_HEADING_NEW_CATEGORY', 'Nova categoria');
define ('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Edita categoria');
define ('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Eliminar Categoria');
define ('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Mou categoria');
define ('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Eliminar producte');
define ('TEXT_INFO_HEADING_MOVE_PRODUCT', 'Move producte');
define ('TEXT_INFO_HEADING_COPY_TO', 'Copia a');

define ('TEXT_DELETE_CATEGORY_INTRO', 'Estàs segur que vols eliminar aquesta categoria?');
define ('TEXT_DELETE_PRODUCT_INTRO', 'Estàs segur que vols eliminar permanentment aquest producte?');

define ('TEXT_DELETE_WARNING_CHILDS', '<strong> ADVERTÈNCIA: </ strong> Hi ha% s (infància) categories segueixen vinculats a aquesta categoria ');
define ('TEXT_DELETE_WARNING_PRODUCTS', '<strong> ADVERTÈNCIA: </ strong> Hi ha% s productes segueixen vinculats a aquesta categoria!');

define ('TEXT_MOVE_PRODUCTS_INTRO', 'Si us plau, selecciona la categoria que voleu <strong>% s </ strong> per a residir a');
define ('TEXT_MOVE_CATEGORIES_INTRO', 'Si us plau, selecciona la categoria que voleu <strong>% s </ strong> per a residir a');
define ('TEXT_MOVE', 'Move <strong>% s </ strong> per a:');

define ('TEXT_NEW_CATEGORY_INTRO', 'Si us plau, completi la següent informació per a la nova categoria');
define ('TEXT_CATEGORIES_NAME ',' Nom de la categoria:');
define ('TEXT_CATEGORIES_IMAGE', 'Categoria d&#39imatge:');
define ('TEXT_SORT_ORDER', 'Ordre de Classificació:');

define ('TEXT_PRODUCTS_STATUS', 'Estat dels productes:');
define ('TEXT_PRODUCTS_DATE_AVAILABLE', 'Data Disponible:');
define ('TEXT_PRODUCT_AVAILABLE', 'En existències');
define ('TEXT_PRODUCT_NOT_AVAILABLE', 'Fora de Stock');
define ('TEXT_PRODUCTS_MANUFACTURER', 'Productes del fabricant:');
define ('TEXT_PRODUCTS_NAME', 'Nom de productes:');
define ('TEXT_PRODUCTS_DESCRIPTION', 'Descripció de productes:');
define ('TEXT_PRODUCTS_QUANTITY', 'Productes Quantitat:');
define ('TEXT_PRODUCTS_MODEL', 'Productes:');
define ('TEXT_PRODUCTS_IMAGE', 'productes d&#39imatge:');
define ('TEXT_PRODUCTS_MAIN_IMAGE', 'Imatge Principal');
define ('TEXT_PRODUCTS_LARGE_IMAGE ',' Ampliació d&#39imatge');
define ('TEXT_PRODUCTS_LARGE_IMAGE_HTML_CONTENT', 'contingut HTML (per popup)');
define ('TEXT_PRODUCTS_ADD_LARGE_IMAGE', 'Afegir Ampliació d&#39imatge');
define ('TEXT_PRODUCTS_LARGE_IMAGE_DELETE_TITLE', 'Eliminar Ampliació d&#39imatge del producte? ');
define ('TEXT_PRODUCTS_LARGE_IMAGE_CONFIRM_DELETE', 'Confirmeu l&#39eliminació de la imatge gran.');
define ('TEXT_PRODUCTS_URL', 'Productes URL:');
define ('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small> (sense http: //) </ small>');
define ('TEXT_PRODUCTS_PRICE_NET', 'Productes Preu (net):');
define ('TEXT_PRODUCTS_PRICE_GROSS', 'Productes Preu (brut):');
define ('TEXT_PRODUCTS_WEIGHT', 'Productes Pes:');

define ('EMPTY_CATEGORY', 'Empty Categoria');

define ('TEXT_HOW_TO_COPY', 'Mètode de còpia:');
define ('TEXT_COPY_AS_LINK', 'producte Link');
define ('TEXT_COPY_AS_DUPLICATE', 'producte Duplica');

define ('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Error: No es pot vincular productes de la mateixa categoria.');
define ('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: directori d&#39imatges del catàleg no es pot escriure:'. DIR_FS_CATALOG_IMAGES);
define ('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: directori d&#39imatges del catàleg no existeix:'. DIR_FS_CATALOG_IMAGES);
define ('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Error :. La categoria no es pot moure dins de la categoria infantil ');

?>
