<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Commande');
define('NAVBAR_TITLE_2', 'Succès');

define('HEADING_TITLE', 'Votre commande a été prise en compte !');

define('TEXT_SUCCESS', 'Votre commande vient d\'être enregistrée par notre système !<br>Vos produits arriveront à destination dans 2-5 jours ouvrés.');
define('TEXT_NOTIFY_PRODUCTS', 'Veuillez m\'alerter des mises à jour des produits que j\'ai choisis ci-dessous :');
define('TEXT_SEE_ORDERS', 'Vous pouvez voir l\'historique de votre commande en consultant la page <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">«&nbsp;Mon compte&nbsp;»</a> et en cliquant sur <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">«&nbsp;Historique&nbsp;»</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Veuillez poser toute question au <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">gestionnaire du site</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Merci d\'avoir effectué vos achats en ligne avec nous !');

define('TABLE_HEADING_COMMENTS', 'Écrivez un commentaire sur la commande passée :');

define('TABLE_HEADING_DOWNLOAD_DATE', 'date d\'expiration : ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' téléchargement(s) restant.');
define('HEADING_DOWNLOAD', 'Téléchargez vos produits ici :');
define('FOOTER_DOWNLOAD', 'Vous pourrez télécharger vos produits plus tard sur «&nbsp;%s&nbsp;».');
?>