<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2009 osCommerce

  Released under the GNU General Public License
*/

define ('HEADING_TITLE', 'Administradors');

define ('TABLE_HEADING_ADMINISTRATORS', 'Administradors');
define ('TABLE_HEADING_HTPASSWD', 'Segur per htpasswd');
define ('TABLE_HEADING_ACTION', 'Acció');

define ('TEXT_INFO_INSERT_INTRO', 'Si us plau introdueix el nou administrador amb el seu dades relacionades');
define ('TEXT_INFO_EDIT_INTRO', 'Si us plau, feu els canvis necessaris');
define ('TEXT_INFO_DELETE_INTRO', 'Estàs segur que vols eliminar aquest administrador?');
define ('TEXT_INFO_HEADING_NEW_ADMINISTRATOR', 'Nou Administrador');
define ('TEXT_INFO_USERNAME', 'Nom d&#39usuari:');
define ('TEXT_INFO_NEW_PASSWORD', 'Nova contrasenya: ');
define ('TEXT_INFO_PASSWORD', 'Contrasenya:');
define ('TEXT_INFO_PROTECT_WITH_HTPASSWD', 'Protegir Amb htaccess / htpasswd');

define ('ERROR_ADMINISTRATOR_EXISTS', 'Error: Administrador ja existeix.');

define ('HTPASSWD_INFO', '<strong> Protecció addicional Amb htaccess / htpasswd </ strong> <p> Aquesta instal·lació Eina d&#39administració d&#39osCommerce Online Merchant no està assegurat, a més, a través de htaccess / htpasswd significa. </ p> <p> Habilita el htaccess capa / seguretat htpasswd emmagatzemarà automàticament nom d&#39usuari i contrasenyes d&#39administrador en un arxiu htpasswd en actualitzar registres de contrasenya d&#39administrador. </ p> <p> <strong> Atenció: </ strong>, si aquesta capa addicional de seguretat està activat i ja no es pot accedir a l&#39eina d&#39administració, si us plau seguiu els canvis i consulti al seu proveïdor de hosting per permetre la protecció htaccess / htpasswd: </ p> <p> <u> <strong> 1 Edita aquest fitxer :. </ strong> </ u> < br /> <br /> '.DIR_FS_ADMIN .' .htaccess </ p> <p> Eliminar les línies següents si hi: </ p> <p> <i>% s </ i> </ p> < p> <u> <strong> 2 Eliminar aquest fitxer :. </ strong> </ u> <br /> <br /> '. DIR_FS_ADMIN.' .htpasswd_oscommerce </ p> ');
define ('HTPASSWD_SECURED', '<strong> Protecció addicional Amb htaccess / htpasswd </ strong> <p> Aquesta instal·lació Eina d&#39administració d&#39osCommerce Online Merchant s&#39assegura, a més, a través de htaccess / htpasswd significa </ p>.');
define ('HTPASSWD_PERMISSIONS', '<strong> Protecció addicional Amb htaccess / htpasswd </ strong> <p> Aquesta instal·lació osCommerce Online Merchant Administration Tool no està assegurat, a més, a través de htaccess / htpasswd significa. </ p> <p> Els següents fitxers hagi de ser escriptura pel servidor web perquè el nivell de seguretat htaccess / htpasswd:  </ p> <ul> <li>'. DIR_FS_ADMIN .' .htaccess </li> <li> '.DIR_FS_ADMIN .'.htpasswd_oscommerce</li> </ ul> <p> Actualitzar aquesta pàgina per confirmar si s&#39han establert els permisos d&#39arxiu correcte </ p>. ')
?>
