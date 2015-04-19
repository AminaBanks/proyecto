<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define ('BOX_TOOLS_BACKUP',' Eines du BACKUP');
define ('HEADING_TITLE', 'Database Backup Manager');

define ('TABLE_HEADING_TITLE', 'Títol');
define ('TABLE_HEADING_FILE_DATE', 'Data');
define ('TABLE_HEADING_FILE_SIZE', 'Mida');
define ('TABLE_HEADING_ACTION', 'Acció');

define ('TEXT_INFO_HEADING_NEW_BACKUP', 'Nova còpia de seguretat');
define ('TEXT_INFO_HEADING_RESTORE_LOCAL', 'Restaura Local');
define ('TEXT_INFO_NEW_BACKUP', 'No interrompi el procés de còpia de seguretat que podria prendre un parell de minuts.');
define ('TEXT_INFO_UNPACK ','<br /> <br /> (després de desempaquetar l&#39arxiu de l&#39arxiu)');
define ('TEXT_INFO_RESTORE', 'No interrompi el procés de restauració. <br /> <br /> La més gran és la còpia de seguretat, com més temps aquest procés pren! <br /> <br /> Si és possible, utilitzeu el client mysql. < br /> <br /> Per exemple: <br /> <br /> <strong>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </strong> %s');

define ('TEXT_INFO_RESTORE_LOCAL', '. No interrompi el procés de restauració <br /> <br /> La més gran és la còpia de seguretat, com més temps aquest procés pren!');
define ('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'El fitxer ha de ser un fitxer sql primera (text).');
define ('TEXT_INFO_DATE', 'Data:');
define ('TEXT_INFO_SIZE', 'Tamany:');
define ('TEXT_INFO_COMPRESSION ',' Compressió:');
define ('TEXT_INFO_USE_GZIP', 'Utilitza GZIP');
define ('TEXT_INFO_USE_ZIP', 'Utilitza postal');
define ('TEXT_INFO_USE_NO_COMPRESSION', 'Sense compressió (Pure SQL)');
define ('TEXT_INFO_DOWNLOAD_ONLY', 'Descarregar solament (no al servidor de la botiga)');
define ('TEXT_INFO_BEST_THROUGH_HTTPS', 'Millor través d&#39una connexió HTTPS');
define ('TEXT_DELETE_INTRO', 'Estàs segur que vols eliminar aquesta còpia de seguretat?');
define ('TEXT_NO_EXTENSION', 'Cap');
define ('TEXT_BACKUP_DIRECTORY ',' Còpia de seguretat Directori:');
define ('TEXT_LAST_RESTORATION', 'Last Restauració:');
define ('TEXT_FORGET', '(<o> oblidar </ u>)');
define ('IMAGE_BACKUP','Nou backup');

define ('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'Error: directori de còpia de seguretat no existeix plau, estableix això en configure.php ..');
define ('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'Error: directori de còpia de seguretat no es pot escriure.');
define ('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'Error: L&#39enllaç de descàrrega no és acceptable.');

define ('SUCCESS_LAST_RESTORE_CLEARED',' Èxit :. La data de l&#39última restauració s&#39ha esborrat');
define ('SUCCESS_DATABASE_SAVED',' Èxit: La base de dades s&#39ha guardat.');
define ('SUCCESS_DATABASE_RESTORED',' Èxit: La base de dades ha estat restaurada.');
define ('SUCCESS_BACKUP_DELETED',' Èxit: La còpia de seguretat s&#39ha eliminat.');


?>
