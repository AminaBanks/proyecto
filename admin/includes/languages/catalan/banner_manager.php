<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/


define ('HEADING_TITLE', 'Bàner administrador');

define ('TABLE_HEADING_BANNERS '," Banners ');
define ('TABLE_HEADING_GROUPS', 'Grups');
define ('TABLE_HEADING_STATISTICS', 'Mostra / Clics ");
define ('TABLE_HEADING_STATUS ',' Estat ');
define ('TABLE_HEADING_ACTION', 'Acció');

define ('TEXT_BANNERS_TITLE', 'Banner Títol:');
define ('TEXT_BANNERS_URL', 'Banner URL:');
define ('TEXT_BANNERS_GROUP', 'Banner Grup:');
define ('TEXT_BANNERS_NEW_GROUP', ', o introduir un nou grup de pancarta de baix');
define ('TEXT_BANNERS_IMAGE', 'Imatge:');
define ('TEXT_BANNERS_IMAGE_LOCAL', 'o introduïu arxiu local baix ');
define ('TEXT_BANNERS_IMAGE_TARGET', 'Imatge Objectiu (Guardar a):');
define ('TEXT_BANNERS_HTML_TEXT', 'Text HTML:');
define ('TEXT_BANNERS_EXPIRES_ON', 'Expira el:');
define ('TEXT_BANNERS_OR_AT', 'o en');
define ('TEXT_BANNERS_IMPRESSIONS ','impressions / views.');
define ('TEXT_BANNERS_SCHEDULED_AT', 'Programat A:');
define ('TEXT_BANNERS_BANNER_NOTE', '<strong> Banner Notes: </ strong> <ul> <li> Utilitzeu una imatge o el text HTML de la bandera - no ambdós </ li> <li> text HTML té prioritat sobre una imatge. </ li> </ ul> ');
define ('TEXT_BANNERS_INSERT_NOTE', 'Notes <strong> Foto: </ strong> <ul> <li> Càrrega de directoris han de tenir l&#39usuari correcte (configuració de permisos d&#39escriptura) </ li> <li> No ompli el \'Desar a \'camp si no es va a carregar una imatge per al servidor web (per exemple, utilitzeu una imatge local (Serverside)).</ li> <li> Le\'camp Guardar a \'ha de ser un directori existent amb un acabant barra (per exemple, banners /).</ li> </ ul> ');
define ('TEXT_BANNERS_EXPIRCY_NOTE', '<strong> Caducitat Notes: </ strong> <ul> <li> Només un dels dos camps han de presentar-</ li> <li> Si el banner no és caducarà automàticament, després abandonen aquests camps en blanc </ li> </ ul> ');
define ('TEXT_BANNERS_SCHEDULE_NOTE', '<strong> Programar Notes: </ strong> <ul> <li> Si un horari està establert, la bandera s&#39activarà en aquesta data </ ​​li> <li> Tots els banners programats es marquen. com inactius fins a la data ha arribat, a la que llavors seran marcats activa </ li> </ ul>. ');

define ('TEXT_BANNERS_DATE_ADDED', 'Data d&#39alta:');
define ('TEXT_BANNERS_SCHEDULED_AT_DATE', 'Programat A: <strong>% s </ strong>');
define ('TEXT_BANNERS_EXPIRES_AT_DATE', 'caduca el: <strong>% s </ strong>');
define ('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'caduca el: <strong>% s </ strong> Impressions');
define ('TEXT_BANNERS_STATUS_CHANGE', 'Canvi d&#39estat:% s');

define ('TEXT_BANNERS_DATA', 'D <br /> <br /> A T <br /> a');
define ('TEXT_BANNERS_LAST_3_DAYS', 'últims 3 dies');
define ('TEXT_BANNERS_BANNER_VIEWS', 'Bàner Vistes');
define ('TEXT_BANNERS_BANNER_CLICKS', 'Bàner Clics ');

define ('TEXT_INFO_DELETE_INTRO', 'Estàs segur que vols eliminar aquest banner?');
define ('TEXT_INFO_DELETE_IMAGE', 'Suprimeix imatge pancarta');

define ('SUCCESS_BANNER_INSERTED ',' Èxit: La bandera s&#39ha inserit.');
define ('SUCCESS_BANNER_UPDATED ',' Èxit: La bandera s&#39ha actualitzat.');
define ('SUCCESS_BANNER_REMOVED ',' Èxit: La bandera s&#39ha eliminat.');
define ('SUCCESS_BANNER_STATUS_UPDATED "," Èxit: L&#39estat de la bandera s&#39ha actualitzat.');

define ('ERROR_BANNER_TITLE_REQUIRED', 'Error: títol Banner requereix.');
define ('ERROR_BANNER_GROUP_REQUIRED', 'Error: Grup Banner requereix.');
define ('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: directori de destí no existeix:% s');
define ('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: El directori de destinació no es pot escriure:% s');
define ('ERROR_IMAGE_DOES_NOT_EXIST', 'Error: la imatge no existeix.');
define ('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Error :. La imatge no es pot treure');
define ('ERROR_UNKNOWN_STATUS_FLAG', 'Error: indicador d&#39estat desconegut.');

define ('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', '. Error: directori de gràfics no existeix plau, creeu un \'gràfics \'\ dins del directori "images \'.');
define ('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Error: directori de gràfics no es pot escriure.');

?>
