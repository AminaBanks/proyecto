<?php
  define('HTTP_SERVER', 'http://artesania.fundacioproide.org/'); //Cambiar estas lineas **************************************************
  define('HTTPS_SERVER', 'http://artesania.fundacioproide.org/'); //Cambiar estas lineas **************************************************
  define('ENABLE_SSL', false);
  define('HTTP_COOKIE_DOMAIN', '');
  define('HTTPS_COOKIE_DOMAIN', '');
  define('HTTP_COOKIE_PATH', '/admin'); //Cambiar estas lineas **************************************************
  define('HTTPS_COOKIE_PATH', '/admin'); //Cambiar estas lineas **************************************************
  define('HTTP_CATALOG_SERVER', 'http://artesania.fundacioproide.org/'); //Cambiar estas lineas **************************************************
  define('HTTPS_CATALOG_SERVER', 'http://artesania.fundacioproide.org/'); //Cambiar estas lineas **************************************************
  define('ENABLE_SSL_CATALOG', 'false');
  define('DIR_FS_DOCUMENT_ROOT', '/home/artesania/public_html/'); //Cambiar estas lineas **************************************************
  define('DIR_WS_ADMIN', '/admin/'); //Cambiar estas lineas **************************************************
  define('DIR_WS_HTTPS_ADMIN', '/admin/'); //Cambiar estas lineas **************************************************
  define('DIR_FS_ADMIN', '/home/artesania/public_html/admin/'); //Cambiar estas lineas **************************************************
  define('DIR_WS_CATALOG', ''); //Cambiar estas lineas **************************************************
  define('DIR_WS_HTTPS_CATALOG', ''); //Cambiar estas lineas **************************************************
  define('DIR_FS_CATALOG', '/home/artesania/public_html/'); //Cambiar estas lineas **************************************************
  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
  define('DIR_WS_CATALOG_IMAGES', DIR_WS_CATALOG . 'images/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');
  define('DIR_WS_CATALOG_LANGUAGES', DIR_WS_CATALOG . 'includes/languages/');
  define('DIR_FS_CATALOG_LANGUAGES', DIR_FS_CATALOG . 'includes/languages/');
  define('DIR_FS_CATALOG_IMAGES', DIR_FS_CATALOG . 'images/');
  define('DIR_FS_CATALOG_MODULES', DIR_FS_CATALOG . 'includes/modules/');
  define('DIR_FS_BACKUP', DIR_FS_ADMIN . 'backups/');
  define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
  define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');

  define('DB_SERVER', 'artesania.fundacioproide.org'); //Cambiar estas lineas **************************************************
  define('DB_SERVER_USERNAME', 'proide'); //Cambiar estas lineas **************************************************
  define('DB_SERVER_PASSWORD', 'proide'); //Cambiar estas lineas **************************************************
  define('DB_DATABASE', 'artesania'); //Cambiar estas lineas **************************************************
  define('USE_PCONNECT', 'false');
  define('STORE_SESSIONS', 'mysql'); //Cambiar estas lineas **************************************************
  define('CFG_TIME_ZONE', 'Europe/Madrid');
?>
