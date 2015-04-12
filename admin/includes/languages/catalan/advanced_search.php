<?php
/*
  $Id: advanced_search.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Cerca Avan&ccedil;ada');
define('NAVBAR_TITLE_2', 'Resultats de la Cerca');

define('HEADING_TITLE_1', 'Cerca Avan&ccedil;ada');
define('HEADING_TITLE_2', 'Productes que satisfan els criteris de cerca');

define('HEADING_SEARCH_CRITERIA', 'Cerca avan&ccedil;ada');

define('TEXT_SEARCH_IN_DESCRIPTION', 'Cercar tamb&eacute; en la descripci&oacute;');
define('ENTRY_CATEGORIES', 'Categories:');
define('ENTRY_INCLUDE_SUBCATEGORIES', 'Inclou subcategories');
define('ENTRY_MANUFACTURERS', 'Fabricant:');
define('ENTRY_PRICE_FROM', 'Des del preu:');
define('ENTRY_PRICE_TO', 'al preu:');
define('ENTRY_DATE_FROM', 'De la data d\'alta:');
define('ENTRY_DATE_TO', 'a l\'alta:');

define('TEXT_SEARCH_HELP_LINK', '<u>Ajuda</u> [?]');

define('TEXT_ALL_CATEGORIES', 'Totes');
define('TEXT_ALL_MANUFACTURERS', 'Tots');

define('HEADING_SEARCH_HELP', 'Consells per a la cerca avan&ccedil;ada');
define('TEXT_SEARCH_HELP', 'El motor de cerca us permet fer una cerca per paraules clau en el model, nom i descripció del producte i en el nom del fabricant.<br><br>Quan feu una cerca per paraules o frases clau, les podeu separar amb els operadors lògics AND i OR. Per exemple, podeu fer una cerca per <u>transmissor AND gossos</u>. Aquesta cerca donaria com a resultat els productes que continguin ambdues paraules. D\'altra banda, si teclegeu  <u>transmissor OR gossos</u>, obtindreu una llista dels productes que continguin les dues o només una de les paraules. Si no es separen les paraules o frases clau amb AND o amb OR, la cerca es farà emprant per defecte l\'operador lògic AND.<br><br>Podeu realitzar cerques exactes de vàries paraules posant-les entre cometes. Per exemple, si busqueu <u>"transmissor de gossos"</u>, obtindreu una llista de productes que tinguin exactament aquesta cadena.<br><br>Es poden fer servir parèntesi per controlar l\'ordre de les operacions lògiques. Per exemple, podeu introduir <u>Transmissor AND (gossos OR falcons OR "de colombicultura")</u>.');
define('TEXT_CLOSE_WINDOW', '<u>Tanca la finestra</u> [x]');

define('TABLE_HEADING_IMAGE', '');
define('TABLE_HEADING_MODEL', 'Model');
define('TABLE_HEADING_PRODUCTS', 'Descripci&oacute;');
define('TABLE_HEADING_MANUFACTURER', 'Fabricant');
define('TABLE_HEADING_QUANTITY', 'Quantitat');
define('TABLE_HEADING_PRICE', 'Preu');
define('TABLE_HEADING_WEIGHT', 'Pes');
define('TABLE_HEADING_BUY_NOW', 'Compra Ara');

define('TEXT_NO_PRODUCTS', 'No hi ha productes que satisfacin els criteris de cerca');

define('ERROR_AT_LEAST_ONE_INPUT', 'Heu d\'introduir almenys un criteri de cerca');
define('ERROR_INVALID_FROM_DATE', 'La Data d\'Alta Des De &eacute;s incorrecta');
define('ERROR_INVALID_TO_DATE', 'La Data d\'Alta Fins &eacute;s incorrecta');
define('ERROR_TO_DATE_LESS_THAN_FROM_DATE', 'La Data d\'Alta Fins ha de ser m&eacute;s gran que la Data d\'Alta Des De');
define('ERROR_PRICE_FROM_MUST_BE_NUM', 'El Preu Des De ha de ser num&egrave;ric');
define('ERROR_PRICE_TO_MUST_BE_NUM', 'El Preu Fins ha de ser num&egrave;ric');
define('ERROR_PRICE_TO_LESS_THAN_PRICE_FROM', 'El Preu Fins ha de ser m&eacute;s gran o igual que el Preu Des De');
define('ERROR_INVALID_KEYWORDS', 'Paraules clau incorrectes');
?>
