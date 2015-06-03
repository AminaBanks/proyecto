<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'en_US'
// on FreeBSD 4.0 I use 'en_US.ISO_8859-1'
// this may not work under win32 environments..
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, array('en_US.UTF-8', 'en_US.UTF8', 'enu_usa'));

define('DATE_FORMAT_SHORT', '%m/%d/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'm/d/Y'); // this is used for date()
define('PHP_DATE_TIME_FORMAT', 'm/d/Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');
define('JQUERY_DATEPICKER_I18N_CODE', ''); // leave empty for en_US; see http://jqueryui.com/demos/datepicker/#localization
define('JQUERY_DATEPICKER_FORMAT', 'mm/dd/yy'); // see http://docs.jquery.com/UI/Datepicker/formatDate
define ('TABLE_HEADING_CATEGORIES_PRODUCTS ',' Categories / Productes ');
////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 3, 2) . substr($date, 0, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
  }
}


// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="ca"');

// charset for web pages and emails
define('CHARSET', 'utf-8');

// page title
define('TITLE', 'Eina d&#39;administraci&#243; d&#39;osCommerce');
define ('TEXT_MANUFACTURERS_IMAGE', 'Imatge');
define ('TABLE_HEADING_CATEGORIES_PRODUCTS','Categories');
define ('TABLE_HEADING_STATUS', 'Estat');
define('TEXT_EDIT_CATEGORIES_NAME','Nom');
define('TEXT_SPECIALS_SPECIAL_PRICE ','Descompte');
define('TABLE_HEADING_DATE_EXPECTED', 'Data d\'espera');
// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Administraci&#243;');
define('HEADER_TITLE_SUPPORT_SITE', 'Suport web');
define('HEADER_TITLE_ONLINE_CATALOG', 'Cat&#243;leg en L&#237;nia');
define('HEADER_TITLE_ADMINISTRATION', 'Administraci&#243;');
define('BOX_TOOLS_BACKUP','Backup');
define('BOX_TOOLS_MAIL','Correu electronic');
define('BOX_TOOLS_SERVER_INFO', 'Server');
define ('TEXT_PRODUCTS_LARGE_IMAGE ',' Ampliació d&#39imatge');

// text for gender
define('MALE', 'Home');
define('FEMALE', 'Dona');

// text for date of birth example
define('DOB_FORMAT_STRING', 'mm/dd/yyyy');

// configuration box text in includes/boxes/configuration.php
define('BOX_HEADING_CONFIGURATION', 'Configuraci&#243;');
define('BOX_CONFIGURATION_MYSTORE', 'Botiga');
define('BOX_CONFIGURATION_LOGGING', 'Usuari');
define('BOX_CONFIGURATION_CACHE', 'Cach&#233;');
define('BOX_CONFIGURATION_ADMINISTRATORS', 'Administradors');
define('BOX_CONFIGURATION_STORE_LOGO', 'Logo Botiga');

// modules box text in includes/boxes/modules.php
define('BOX_HEADING_MODULES', 'Moduls');

// categories box text in includes/boxes/catalog.php
define('BOX_HEADING_CATALOG', 'Catal&#232;g');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Categories/Productes');
define('BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES', ' Atributs des Productes');
define('BOX_CATALOG_MANUFACTURERS', '	Fabricants');
define('BOX_CATALOG_REVIEWS', 'Commentaris');
define('BOX_CATALOG_SPECIALS', 'Especials');
define('BOX_CATALOG_PRODUCTS_EXPECTED', 'Productes Esperava');

// customers box text in includes/boxes/customers.php
define('BOX_HEADING_CUSTOMERS', 'Clients');
define('BOX_CUSTOMERS_CUSTOMERS', 'Clients');

// orders box text in includes/boxes/orders.php
define('BOX_HEADING_ORDERS', 'Comandes');
define('BOX_ORDERS_ORDERS', 'Comandes');

// taxes box text in includes/boxes/taxes.php
define('BOX_HEADING_LOCATION_AND_TAXES', 'Zones / Impostos');
define('BOX_TAXES_COUNTRIES', 'Pa&#239;sos');
define('BOX_TAXES_ZONES', 'Zones');
define('BOX_TAXES_GEO_ZONES', 'Zones tribut&#243;ries');
define('BOX_TAXES_TAX_CLASSES', 'Classes d&#39;impostos');
define('BOX_TAXES_TAX_RATES', 'Taxes  d&#39;impostos');

// reports box text in includes/boxes/reports.php
define('BOX_HEADING_REPORTS', 'Informes');
define('BOX_REPORTS_PRODUCTS_VIEWED', 'Productes vists');
define('BOX_REPORTS_PRODUCTS_PURCHASED', 'Productes adquirits');
define('BOX_REPORTS_ORDERS_TOTAL', 'Clients commenda total');

// tools text in includes/boxes/tools.php
define ('BOX_HEADING_TOOLS', 'Eines');
define ('BOX_TOOLS_ACTION_RECORDER', 'Gravadora d&#39;accions');
define ('BOX_TOOLS_BACKUP ','Base de dades  còpia de seguretat');
define ('BOX_TOOLS_BANNER_MANAGER', 'Administrador de Banner');
define ('BOX_TOOLS_CACHE', 'Control de memòria cau');
define ('BOX_TOOLS_DEFINE_LANGUAGE', 'Definir Idiomes');
define ('BOX_TOOLS_MAIL '," enviar consulta");
define ('BOX_TOOLS_NEWSLETTER_MANAGER', 'Butllet&#237; Administrador');
define ('BOX_TOOLS_SEC_DIR_PERMISSIONS', 'Directori de Seguretat de permisos');
define ('BOX_TOOLS_SERVER_INFO ',' Servidor d&#39;Informaci&#243;');
define ('BOX_TOOLS_VERSION_CHECK', 'Version Checker');
define ('BOX_TOOLS_WHOS_ONLINE', 'Qui \' s en línia ');

// localizaion box text in includes/boxes/localization.php
define ('BOX_HEADING_LOCALIZATION', 'Localitzaci&#243;');
define ('BOX_LOCALIZATION_CURRENCIES ',' Monedes');
define ('BOX_LOCALIZATION_LANGUAGES', 'Idiomes');
define ('BOX_LOCALIZATION_ORDERS_STATUS', 'de la seva comanda');


// javascript messages
define ('JS_ERROR', 'Els errors s&#39;han produït durant el procés de la seva formulari \ nSi us plau, feu les següents correccions: \ n \ n ');

define ('JS_OPTIONS_VALUE_PRICE', '* El nou atribut producte necessita un valor preu \ n');
define ('JS_OPTIONS_VALUE_PRICE_PREFIX', '* El nou atribut producte necessita un preu prefix \ n');

define ('JS_PRODUCTS_NAME', '* El nou producte necessita un nom \ n ');
define ('JS_PRODUCTS_DESCRIPTION', '* El nou producte necessita una descripció \ n');
define ('JS_PRODUCTS_PRICE', '* El nou producte necessita un valor preu \ n');
define ('JS_PRODUCTS_WEIGHT', '* El nou producte necessita un valor de pes \ n');
define ('JS_PRODUCTS_QUANTITY', '* El nou producte necessita un valor de quantitat \ n');
define ('JS_PRODUCTS_MODEL', '* El nou producte necessita un valor model \ n');
define ('JS_PRODUCTS_IMAGE', '* El nou producte necessita un valor d&#39;imatge \ n');

define ('JS_SPECIALS_PRODUCTS_PRICE', '* Un nou preu d&#39;aquest producte s&#39;ha d&#39;establir \ n');

define ('JS_GENDER', '* El \' Sexe \'valor ha de ser elegit. \ n ');
define ('JS_FIRST_NAME', '* El \' Nom \'entrada ha de tenir almenys' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caràcters \ n');
define ('JS_LAST_NAME', '* El \' Last Name \'entrada ha de tenir almenys' .ENTRY_LAST_NAME_MIN_LENGTH .' caràcters \ n');
define ('JS_DOB', '* El \' Data de Naixement \'entrada ha d&#39;estar en el format :. xx / xx / xxxx (mes / dia / any) \ n ');
define ('JS_EMAIL_ADDRESS', '* L&#39; \' Adreça E-Mail \'entrada ha de tenir almenys '.ENTRY_EMAIL_ADDRESS_MIN_LENGTH .' caràcters \ n');
define ('JS_ADDRESS', '* La \' Direcció \'entrada ha de tenir almenys' .ENTRY_STREET_ADDRESS_MIN_LENGTH . 'caràcters \ n');
define ('JS_POST_CODE', '* El \' Codi Postal \'entrada ha de tenir almenys' .ENTRY_POSTCODE_MIN_LENGTH .'caràcters \ n' );
define ('JS_CITY', '* El \' City \'entrada ha de tenir almenys' .ENTRY_CITY_MIN_LENGTH . 'caràcters \ n');
define ('JS_STATE', '* El \' Estat \'entrada s&#39;ha de seleccionar. \ n ');
define ('JS_STATE_SELECT', '- Seleccioneu sobre de -');
define ('JS_ZONE', '* El \' Estat \'d&#39;entrada s&#39;ha de seleccionar de la llista per a aquest país.');
define ('JS_COUNTRY', '* El \' Country \'valor ha de ser elegit. \ n ');
define ('JS_TELEPHONE', '* El \' Número de telèfon \'entrada ha de tenir almenys' .ENTRY_TELEPHONE_MIN_LENGTH .' caràcters\n' );
define ('JS_PASSWORD', '* El \' Password \'amd \' \'Confirmació entrades han de coincidir amd tenir almenys' .ENTRY_PASSWORD_MIN_LENGTH.' caràcters \ n');

define ('JS_ORDER_DOES_NOT_EXIST', 'Número d&#39;ordre% s no existeix!');

define ('CATEGORY_PERSONAL', 'Personal');
define ('CATEGORY_ADDRESS', 'Adreça');
define ('CATEGORY_CONTACT', 'Contacte');
define ('CATEGORY_COMPANY', 'Companyia');
define ('CATEGORY_OPTIONS', 'Opcions');

define ('ENTRY_GENDER', 'Gènere:');
define ('ENTRY_GENDER_ERROR', '<span class = "textoError"> requerida </ span>');
define ('ENTRY_FIRST_NAME', 'Nom:');
define ('ENTRY_FIRST_NAME_ERROR' , ' <span class = "textoError"> min' .ENTRY_FIRST_NAME_MIN_LENGTH.' caràcters </ span>');
define ('ENTRY_LAST_NAME ',' Cognom:');
define ('ENTRY_LAST_NAME_ERROR' , ' <span class = "textoError"> min' .ENTRY_LAST_NAME_MIN_LENGTH.  ' caràcters </ span>');
define ('ENTRY_DATE_OF_BIRTH ',' Data de Naixement:');
define ('ENTRY_DATE_OF_BIRTH_ERROR', ' <span class = "textoError"> (per exemple, 05/21/1970) </ span>.');
define ('ENTRY_EMAIL_ADDRESS', 'Adreça E-Mail:');
define ('ENTRY_EMAIL_ADDRESS_ERROR' , ' <span class = "textoError"> min' .ENTRY_EMAIL_ADDRESS_MIN_LENGTH .'caràcters </ span>');
define ('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', ' <span class = "textoError"> L&#39;adreça de correu electrònic doesn\'t sembla vàlid </ span> ');
define ('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', ' <span class = "textoError"> Aquesta adreça de correu electrònic ja existeix </ span>');
define ('ENTRY_COMPANY', 'Nom d&#39;empresa:');
define ('ENTRY_STREET_ADDRESS','Direcció:');
define ('ENTRY_STREET_ADDRESS_ERROR' , ' <span class = "textoError"> min' .ENTRY_STREET_ADDRESS_MIN_LENGTH .'caràcters </ span>');
define ('ENTRY_SUBURB ','localitat:');
define ('ENTRY_POST_CODE', 'Codi postal:');
define ('ENTRY_POST_CODE_ERROR' , '  <span class = "textoError"> min' .ENTRY_POSTCODE_MIN_LENGTH.' caràcters </ span>');
define ('ENTRY_CITY', 'Ciutat:');
define ('ENTRY_CITY_ERROR' , '  <span class = "textoError"> min' .ENTRY_CITY_MIN_LENGTH.'caràcters </ span>');
define ('ENTRY_STATE', 'Estat:');
define ('ENTRY_STATE_ERROR', ' <span class ="textoError"> requerida </ span>');
define ('ENTRY_COUNTRY', 'Country:');
define ('ENTRY_COUNTRY_ERROR', 'Ha de seleccionar un país dels Països del menú desplegable.');
define ('ENTRY_TELEPHONE_NUMBER', 'Número de telèfon:');
define ('ENTRY_TELEPHONE_NUMBER_ERROR' , ' <span class = "textoError"> min' .ENTRY_TELEPHONE_MIN_LENGTH.' caràcters </ span>');
define ('ENTRY_FAX_NUMBER', 'Nombre de fax:');
define ('ENTRY_NEWSLETTER', 'Butlletí:');
define ('ENTRY_NEWSLETTER_YES ',' Subscrit ');
define ('ENTRY_NEWSLETTER_NO', 'no subscriure');

// images

define('TITLE', 'osCommerce Online Merchant Administration Tool'); 
// header text in includes/header.php define('HEADER_TITLE_TOP', 'Administration'); define('HEADER_TITLE_SUPPORT_SITE', 'Support Site'); define('HEADER_TITLE_ONLINE_CATALOG', 'Online Catalog'); define('HEADER_TITLE_ADMINISTRATION', 'Administration'); // text for gender define('MALE', 'Male'); define('FEMALE', 'Female'); // text for date of birth example define('DOB_FORMAT_STRING', 'mm/dd/yyyy'); // configuration box text in includes/boxes/configuration.php define('BOX_HEADING_CONFIGURATION', 'Configuration'); define('BOX_CONFIGURATION_MYSTORE', 'My Store'); define('BOX_CONFIGURATION_LOGGING', 'Logging'); define('BOX_CONFIGURATION_CACHE', 'Cache'); define('BOX_CONFIGURATION_ADMINISTRATORS', 'Administrators'); define('BOX_CONFIGURATION_STORE_LOGO', 'Store Logo'); // modules box text in includes/boxes/modules.php define('BOX_HEADING_MODULES', 'Modules'); // categories box text in includes/boxes/catalog.php define('BOX_HEADING_CATALOG', 'Catalog'); define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Categories/Products'); define('BOX CATALOG CATEGORIES PRODUCTS ATTRIBUTES', 'Products Attributes'); define('BOX_CATALOG_MANUFACTURERS', 'Manufacturers'); define('BOX_CATALOG_REVIEWS', 'Reviews'); define('BOX_CATALOG_SPECIALS', 'Specials'); define('BOX_CATALOG_PRODUCTS_EXPECTED', 'Products Expected'); // customers box text in includes/boxes/customers.php define('BOX_HEADING_CUSTOMERS', 'Customers'); define('BOX_CUSTOMERS_CUSTOMERS', 'Customers'); // orders box text in includes/boxes/orders.php define('BOX_HEADING_ORDERS', 'Orders'); define('BOX_ORDERS_ORDERS', 'Orders'); // taxes box text in includes/boxes/taxes.php define('BOX_HEADING_LOCATION_AND_TAXES', 'Locations / Taxes'); define('BOX_TAXES_COUNTRIES', 'Countries'); define('BOX_TAXES_ZONES', 'Zones'); define('BOX_TAXES_GEO_ZONES', 'Tax Zones'); define('BOX_TAXES_TAX_CLASSES', 'Tax Classes'); define('BOX_TAXES_TAX_RATES', 'Tax Rates'); // reports box text in includes/boxes/reports.php define('BOX_HEADING_REPORTS', 'Reports'); define('BOX_REPORTS_PRODUCTS_VIEWED', 'Products Viewed'); define('BOX_REPORTS_PRODUCTS_PURCHASED', 'Products Purchased'); define('BOX_REPORTS_ORDERS_TOTAL', 'Customer Orders-Total'); // tools text in includes/boxes/tools.php define('BOX_HEADING_TOOLS', 'Tools'); define('BOX_TOOLS_ACTION_RECORDER', 'Action Recorder'); define('BOX_TOOLS_BACKUP', 'Database Backup'); define('BOX_TOOLS_BANNER_MANAGER', 'Banner Manager'); define('BOX_TOOLS_CACHE', 'Cache Control'); define('BOX_TOOLS_DEFINE_LANGUAGE', 'Define Languages'); define('BOX_TOOLS_MAIL', 'Send Email'); define('BOX_TOOLS_NEWSLETTER_MANAGER', 'Newsletter Manager'); define('BOX_TOOLS_SEC_DIR_PERMISSIONS', 'Security Directory Permissions'); define('BOX_TOOLS_SERVER_INFO', 'Server Info'); define('BOX_TOOLS_VERSION_CHECK', 'Version Checker'); define('BOX_TOOLS_WHOS_ONLINE', 'Who\'s Online'); // localizaion box text in includes/boxes/localization.php define('BOX_HEADING_LOCALIZATION', 'Localization'); define('BOX_LOCALIZATION_CURRENCIES', 'Currencies'); define('BOX_LOCALIZATION_LANGUAGES', 'Languages'); define('BOX_LOCALIZATION_ORDERS_STATUS', 'Orders Status'); // javascript messages define('JS_ERROR', 'Errors have occured during the process of your form!\nPlease make the following corrections:\n\n'); define('JS_OPTIONS_VALUE_PRICE', '* The new product atribute needs a price value\n'); define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* The new product atribute needs a price prefix\n'); define('JS_PRODUCTS_NAME', '* The new product needs a name\n'); define('JS_PRODUCTS_DESCRIPTION', '* The new product needs a description\n'); define('JS_PRODUCTS_PRICE', '* The new product needs a price value\n'); define('JS_PRODUCTS_WEIGHT', '* The new product needs a weight value\n'); define('JS_PRODUCTS_QUANTITY', '* The new product needs a quantity value\n'); define('JS_PRODUCTS_MODEL', '* The new product needs a model value\n'); define('JS_PRODUCTS_IMAGE', '* The new product needs an image value\n'); define('JS_SPECIALS_PRODUCTS_PRICE', '* A new price for this product needs to be set\n'); define('JS_GENDER', '* The \'Gender\' value must be chosen.\n'); define('JS_FIRST_NAME', '* The \'First Name\' entry must have at least ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' characters.\n'); define('JS_LAST_NAME', '* The \'Last Name\' entry must have at least ' . ENTRY_LAST_NAME_MIN_LENGTH . ' characters.\n'); define('JS_DOB', '* The \'Date of Birth\' entry must be in the format: xx/xx/xxxx (month/date/year).\n'); define('JS_EMAIL_ADDRESS', '* The \'E-Mail Address\' entry must have at least ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' characters.\n'); define('JS_ADDRESS', '* The \'Street Address\' entry must have at least ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' characters.\n'); define('JS_POST_CODE', '* The \'Post Code\' entry must have at least ' . ENTRY_POSTCODE_MIN_LENGTH . ' characters.\n'); define('JS_CITY', '* The \'City\' entry must have at least ' . ENTRY_CITY_MIN_LENGTH . ' characters.\n'); define('JS_STATE', '* The \'State\' entry is must be selected.\n'); define('JS_STATE_SELECT', '-- Select Above --'); define('JS_ZONE', '* The \'State\' entry must be selected from the list for this country.'); define('JS_COUNTRY', '* The \'Country\' value must be chosen.\n'); define('JS_TELEPHONE', '* The \'Telephone Number\' entry must have at least ' . ENTRY_TELEPHONE_MIN_LENGTH . ' characters.\n'); define('JS_PASSWORD', '* The \'Password\' amd \'Confirmation\' entries must match amd have at least ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.\n'); define('JS_ORDER_DOES_NOT_EXIST', 'Order Number %s does not exist!'); define('CATEGORY_PERSONAL', 'Personal'); define('CATEGORY_ADDRESS', 'Address'); define('CATEGORY_CONTACT', 'Contact'); define('CATEGORY_COMPANY', 'Company'); define('CATEGORY_OPTIONS', 'Options'); define('ENTRY_GENDER', 'Gender:'); define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">required</span>'); define('ENTRY_FIRST_NAME', 'First Name:'); define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' chars</span>'); define('ENTRY_LAST_NAME', 'Last Name:'); define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' chars</span>'); define('ENTRY_DATE_OF_BIRTH', 'Date of Birth:'); define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(eg. 05/21/1970)</span>'); define('ENTRY_EMAIL_ADDRESS', 'E-Mail Address:'); define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' chars</span>'); define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">The email address doesn\'t appear to be valid!</span>'); define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">This email address already exists!</span>'); define('ENTRY_COMPANY', 'Company name:'); define('ENTRY_STREET_ADDRESS', 'Street Address:'); define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' chars</span>'); define('ENTRY_SUBURB', 'Suburb:'); define('ENTRY_POST_CODE', 'Post Code:'); define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_POSTCODE_MIN_LENGTH . ' chars</span>'); define('ENTRY_CITY', 'City:'); define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_CITY_MIN_LENGTH . ' chars</span>'); define('ENTRY_STATE', 'State:'); define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">required</span>'); define('ENTRY_COUNTRY', 'Country:'); define('ENTRY_COUNTRY_ERROR', 'You must select a country from the Countries pull down menu.'); define('ENTRY_TELEPHONE_NUMBER', 'Telephone Number:'); define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' chars</span>'); define('ENTRY_FAX_NUMBER', 'Fax Number:'); define('ENTRY_NEWSLETTER', 'Newsletter:'); define('ENTRY_NEWSLETTER_YES', 'Subscribed'); define('ENTRY_NEWSLETTER_NO', 'Unsubscribed'); // images define('IMAGE_ANI_SEND_EMAIL', 'Sending E-Mail'); define('IMAGE_BACK', 'Back'); define('IMAGE_BACKUP', 'Backup'); define('IMAGE_CANCEL', 'Cancel'); define('IMAGE_CONFIRM', 'Confirm'); define('IMAGE_COPY', 'Copy'); define('IMAGE_COPY_TO', 'Copy To'); define('IMAGE_DETAILS', 'Details'); define('IMAGE_DELETE', 'Delete'); define('IMAGE_EDIT', 'Edit'); define('IMAGE_EMAIL', 'Email'); define('IMAGE_EXPORT', 'Export'); define('IMAGE_ICON_STATUS_GREEN', 'Active'); define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Set Active'); define('IMAGE_ICON_STATUS_RED', 'Inactive'); define('IMAGE_ICON_STATUS_RED_LIGHT', 'Set Inactive'); define('IMAGE_ICON_INFO', 'Info'); define('IMAGE_INSERT', 'Insert'); define('IMAGE_LOCK', 'Lock'); define('IMAGE_MODULE_INSTALL', 'Install Module'); define('IMAGE_MODULE_REMOVE', 'Remove Module'); define('IMAGE_MOVE', 'Move'); define('IMAGE_NEW_BANNER', 'New Banner'); define('IMAGE_NEW_CATEGORY', 'New Category'); define('IMAGE_NEW_COUNTRY', 'New Country'); define('IMAGE_NEW_CURRENCY', 'New Currency'); define('IMAGE_NEW_FILE', 'New File'); define('IMAGE_NEW_FOLDER', 'New Folder'); define('IMAGE_NEW_LANGUAGE', 'New Language'); define('IMAGE_NEW_NEWSLETTER', 'New Newsletter'); define('IMAGE_NEW_PRODUCT', 'New Product'); define('IMAGE_NEW_TAX_CLASS', 'New Tax Class'); define('IMAGE_NEW_TAX_RATE', 'New Tax Rate'); define('IMAGE_NEW_TAX_ZONE', 'New Tax Zone'); define('IMAGE_NEW_ZONE', 'New Zone'); define('IMAGE_ORDERS', 'Orders'); define('IMAGE_ORDERS_INVOICE', 'Invoice'); define('IMAGE_ORDERS_PACKINGSLIP', 'Packing Slip'); define('IMAGE_PREVIEW', 'Preview'); define('IMAGE_RESTORE', 'Restore'); define('IMAGE_RESET', 'Reset'); define('IMAGE_SAVE', 'Save'); define('IMAGE_SEARCH', 'Search'); define('IMAGE_SELECT', 'Select'); define('IMAGE_SEND', 'Send'); define('IMAGE_SEND_EMAIL', 'Send Email'); define('IMAGE_UNLOCK', 'Unlock'); define('IMAGE_UPDATE', 'Update'); define('IMAGE_UPDATE_CURRENCIES', 'Update Exchange Rate'); define('IMAGE_UPLOAD', 'Upload'); define('ICON_CROSS', 'False'); define('ICON_CURRENT_FOLDER', 'Current Folder'); define('ICON_DELETE', 'Delete'); define('ICON_ERROR', 'Error'); define('ICON_FILE', 'File'); define('ICON_FILE_DOWNLOAD', 'Download'); define('ICON_FOLDER', 'Folder'); define('ICON_LOCKED', 'Locked'); define('ICON_PREVIOUS_LEVEL', 'Previous Level'); define('ICON_PREVIEW', 'Preview'); define('ICON_STATISTICS', 'Statistics'); define('ICON_SUCCESS', 'Success'); define('ICON_TICK', 'True'); define('ICON_UNLOCKED', 'Unlocked'); define('ICON_WARNING', 'Warning'); // constants for use in tep_prev_next_display function define('TEXT_RESULT_PAGE', 'Page %s of %d'); define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> banners)'); define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> countries)'); define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> customers)'); define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> currencies)'); define('TEXT_DISPLAY_NUMBER_OF_ENTRIES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> entries)'); define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> languages)'); define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> manufacturers)'); define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> newsletters)'); define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> orders)'); define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> orders status)'); define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> products)'); define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> products expected)'); define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> product reviews)'); define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> products on special)'); define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> tax classes)'); define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> tax zones)'); define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> tax rates)'); define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Displaying <strong>%d</strong> to <strong>%d</strong> (of <strong>%d</strong> zones)'); define('PREVNEXT_BUTTON_PREV', '&lt;&lt;'); define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;'); define('TEXT_DEFAULT', 'default'); define('TEXT_SET_DEFAULT', 'Set as default'); define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* Required</span>'); define('TEXT_CACHE_CATEGORIES', 'Categories Box'); define('TEXT_CACHE_MANUFACTURERS', 'Manufacturers Box'); define('TEXT_CACHE_ALSO_PURCHASED', 'Also Purchased Module'); define('TEXT_NONE', '--none--'); define('TEXT_TOP', 'Top'); define('ERROR_DESTINATION_DOES_NOT_EXIST', 'Error: Destination does not exist.'); define('ERROR_DESTINATION_NOT_WRITEABLE', 'Error: Destination not writeable.'); define('ERROR_FILE_NOT_SAVED', 'Error: File upload not saved.'); define('ERROR_FILETYPE_NOT_ALLOWED', 'Error: File upload type not allowed.'); define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'Success: File upload saved successfully.'); define('WARNING_NO_FILE_UPLOADED', 'Warning: No file uploaded.'); // bootstrap helper define('MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION', '<p>Content Width can be 12 or less per column per row.</p><p>12/12 = 100% width, 6/12 = 50% width, 4/12 = 33% width.</p><p>Total of all columns in any one row must equal 12 (eg: 3 boxes of 4 columns each, 1 box of 12 columns and so on).</p>');
define ('TÍTOL', 'Eina d&#39;administració d&#39;osCommerce,');

// Text de capçalera en includes / header.php
define ('HEADER_TITLE_TOP', 'Administració');
define ('HEADER_TITLE_SUPPORT_SITE', 'Suport del lloc');
define ('HEADER_TITLE_ONLINE_CATALOG ',' Catàleg en Línia');
define ('HEADER_TITLE_ADMINISTRATION', 'Administració');

// Text de gènere
define ('MALE', 'Home');
define ('FEMELLE', 'Dona');

// Text per a la data de naixement exemple
define ('DOB_FORMAT_STRING ','dd / mm / aaaa');

// Configuració de text quadre en includes / caixes / configuration.php
define ('BOX_HEADING_CONFIGURATION', 'Configuració');
define ('BOX_CONFIGURATION_MYSTORE ',' El meu Botiga ');
define ('BOX_CONFIGURATION_LOGGING', 'Registre');
define ('BOX_CONFIGURATION_CACHE', 'Caché');
define ('BOX_CONFIGURATION_ADMINISTRATORS', 'Administradors');
define ('BOX_CONFIGURATION_STORE_LOGO', 'Logo Store');

// Mòduls quadre de text a includes / caixes / modules.php
define ('BOX_HEADING_MODULES', 'Mòduls');

// Categories quadre de text a includes / caixes / catalog.php
define ('BOX_HEADING_CATALOG', 'Catàleg');
define ('BOX_CATALOG_CATEGORIES_PRODUCTS '," Categories / Productes ");
define ('BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES', 'Productes Atributs');
define ('BOX_CATALOG_MANUFACTURERS', 'Constructors');
define ('BOX_CATALOG_REVIEWS', 'Comentaris');
define ('BOX_CATALOG_SPECIALS', 'especials');
define ('BOX_CATALOG_PRODUCTS_EXPECTED', 'Productes esperava');

// Text quadre de clients en includes / caixes / clientes.php
define ('BOX_HEADING_CUSTOMERS', 'Clients');
define ('BOX_CUSTOMERS_CUSTOMERS', 'Clients');

// Ordres quadre de text a includes / caixes / orders.php
define ('BOX_HEADING_ORDERS ',' Ordres ');
define ('BOX_ORDERS_ORDERS ',' Ordres ');

// Impostos text quadre en includes / caixes / taxes.php

define ('BOX_HEADING_LOCATION_AND_TAXES',' Zones / Impostos');
define ('BOX_TAXES_COUNTRIES', 'Països');
define ('BOX_TAXES_ZONES','zones');
define ('BOX_TAXES_GEO_ZONES ',' Zones tributàries');
define ('BOX_TAXES_TAX_CLASSES ',' Classes d&#39;impostos ');
define ('BOX_TAXES_TAX_RATES', 'taxes d&#39;impostos ');

// Informes quadre de text a includes / caixes / reports.php
define ('BOX_HEADING_REPORTS', 'Informes');
define ('BOX_REPORTS_PRODUCTS_VIEWED', 'Productes vists');
define ('BOX_REPORTS_PRODUCTS_PURCHASED', 'productes adquirits');
define ('BOX_REPORTS_ORDERS_TOTAL', 'Clients Ordres-Total ');

// Eines de text en includes / caixes / tools.php
define ('BOX_HEADING_TOOLS', 'Eines');
define ('BOX_TOOLS_ACTION_RECORDER', 'Gravadora d&#39;accions');
define ('BOX_TOOLS_BACKUP ',' Base de dades de còpia de seguretat');
define ('BOX_TOOLS_BANNER_MANAGER', 'Administrador de Banner');
define ('BOX_TOOLS_CACHE', 'Control de memòria cau');
define ('BOX_TOOLS_DEFINE_LANGUAGE', 'Definir Idiomes');
define ('BOX_TOOLS_MAIL ',' enviar consulta');
define ('BOX_TOOLS_NEWSLETTER_MANAGER', 'Butlletí Administrador');
define ('BOX_TOOLS_SEC_DIR_PERMISSIONS', 'Directori de Seguretat de permisos');
define ('BOX_TOOLS_SERVER_INFO ',' Servidor d&#39;Informació');
define ('BOX_TOOLS_VERSION_CHECK', 'Version Checker');
define ('BOX_TOOLS_WHOS_ONLINE', 'Qui \' s en línia ');

// Text quadre localizaion en includes / caixes / localization.php
define ('BOX_HEADING_LOCALIZATION', 'Localització');
define ('BOX_LOCALIZATION_CURRENCIES ',' Monedes');
define ('BOX_LOCALIZATION_LANGUAGES', 'Idiomes');
define ('BOX_LOCALIZATION_ORDERS_STATUS', 'de la seva comanda');

// Missatges javascript
define ('JS_ERROR', 'Els errors s&#39;han produït durant el procés de la seva formulari \ nSi us plau, feu les següents correccions: \ n \ n ');

define ('JS_OPTIONS_VALUE_PRICE', '* El nou atribut producte necessita un valor preu \ n');
define ('JS_OPTIONS_VALUE_PRICE_PREFIX', '* El nou atribut producte necessita un preu prefix \ n');

define ('JS_PRODUCTS_NAME', '* El nou producte necessita un nom \ n ');
define ('JS_PRODUCTS_DESCRIPTION', '* El nou producte necessita una descripció \ n');
define ('JS_PRODUCTS_PRICE', '* El nou producte necessita un valor preu \ n');
define ('JS_PRODUCTS_WEIGHT', '* El nou producte necessita un valor de pes \ n');
define ('JS_PRODUCTS_QUANTITY', '* El nou producte necessita un valor de quantitat \ n');
define ('JS_PRODUCTS_MODEL', '* El nou producte necessita un valor model \ n');
define ('JS_PRODUCTS_IMAGE', '* El nou producte necessita un valor d&#39;imatge \ n');

define ('JS_SPECIALS_PRODUCTS_PRICE', ' *Un nou preu d&#39;aquest producte s&#39;ha d&#39;establir \ n');

define ('JS_GENDER', '* El \' Sexe \'valor ha de ser elegit. \ n ');
define ('JS_FIRST_NAME', '* El \' Nom \'entrada ha de tenir almenys' .ENTRY_FIRST_NAME_MIN_LENGTH.' caràcters \ n');
define ('JS_LAST_NAME', '* El \' Last Name \'entrada ha de tenir almenys' .ENTRY_LAST_NAME_MIN_LENGTH.' caràcters \ n' );
define ('JS_DOB', '* El \' Data de Naixement \ entrada ha d&#39;estar en el format :. xx / xx / xxxx (mes / dia / any) \ n ');
define ('JS_EMAIL_ADDRESS', '* El \' Adreça E-Mail \'entrada ha de tenir almenys' .ENTRY_EMAIL_ADDRESS_MIN_LENGTH.' caràcters \ n');
define ('JS_ADDRESS', '* El \' Direcció \'entrada ha de tenir almenys' .ENTRY_STREET_ADDRESS_MIN_LENGTH.' caràcters \ n');
define ('JS_POST_CODE', '* El \' Codi Postal \'entrada ha de tenir almenys' .ENTRY_POSTCODE_MIN_LENGTH .'caràcters \ n');
define ('JS_CITY', '* El \' City \'entrada ha de tenir almenys' .ENTRY_CITY_MIN_LENGTH.' caràcters \ n.' );
define ('JS_STATE', '* El \' Estat \'entrada s&#39;ha de seleccionar. \ n ');
define ('JS_STATE_SELECT', '- Seleccioneu sobre de -');
define ('JS_ZONE', '* El \' Estat \'d&#39;entrada s&#39;ha de seleccionar de la llista per a aquest país.');
define ('JS_COUNTRY', '* El \' Country \'valor ha de ser elegit. \ n ');
define ('JS_TELEPHONE', '* El \' Número de telèfon \'entrada ha de tenir almenys' .ENTRY_TELEPHONE_MIN_LENGTH.' caràcters \ n' );
define ('JS_PASSWORD', '* El \' Password \'amd \' \'Confirmació entrades han de coincidir amd tenir almenys' .ENTRY_PASSWORD_MIN_LENGTH.' caràcters \ n');

define ('JS_ORDER_DOES_NOT_EXIST', 'Número d&#39;&#39;ordre% s no existeix!');

define ('CATEGORY_PERSONAL', 'Personal');
define ('CATEGORY_ADDRESS', 'Adreça');
define ('CATEGORY_CONTACT', 'Contacte');
define ('CATEGORY_COMPANY', 'Companyia');
define ('CATEGORY_OPTIONS', 'Opcions');

define ('ENTRY_GENDER', 'Gènere:');
define ('ENTRY_GENDER_ERROR', '<span class = "textoError"> requerida </ span>');
define ('ENTRY_FIRST_NAME', 'Nom:');
define ('ENTRY_FIRST_NAME_ERROR' , ' <span class = "textoError"> min' .ENTRY_FIRST_NAME_MIN_LENGTH .' caràcters </span>');
define ('ENTRY_LAST_NAME','Cognom:');
define ('ENTRY_LAST_NAME_ERROR' , '  <span class = "textoError"> min' .ENTRY_LAST_NAME_MIN_LENGTH .'caràcters </ span>');
define ('ENTRY_DATE_OF_BIRTH ',' Data de Naixement:');
define ('ENTRY_DATE_OF_BIRTH_ERROR', ' <span class = "textoError"> (per exemple, 1970.05.21) </ span>.');
define ('ENTRY_EMAIL_ADDRESS', 'Adreça E-Mail:');
define ('ENTRY_EMAIL_ADDRESS_ERROR' , ' &nbsp; <span class = "textoError"> min' .ENTRY_EMAIL_ADDRESS_MIN_LENGTH.' caràcters </span>');
define ('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', ' <span class = "textoError"> L&#39;adreça de correu electrònic doesn \' t sembla vàlid </ span> ');
define ('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '<span class = "textoError"> Aquesta adreça de correu electrònic ja existeix </ span>');
define ('ENTRY_COMPANY', 'Nom d&#39;empresa:');
define ('ENTRY_STREET_ADDRESS', 'Direcció:');
define ('ENTRY_STREET_ADDRESS_ERROR' , '  <span class = "textoError"> min' .ENTRY_STREET_ADDRESS_MIN_LENGTH .'caràcters </ span>');
define ('ENTRY_SUBURB ',' localitat:');
define ('ENTRY_POST_CODE', 'Codi postal:');
define ('ENTRY_POST_CODE_ERROR' , ' <span class = "textoError"> min' .ENTRY_POSTCODE_MIN_LENGTH.' caràcters </ span>');
define ('ENTRY_CITY', 'Ciutat:');
define ('ENTRY_CITY_ERROR' , '  <span class = "textoError"> min' .ENTRY_CITY_MIN_LENGTH .'caràcters </ span>');
define ('ENTRY_STATE', 'Estat:');
define ('ENTRY_STATE_ERROR', ' <span class = "textoError"> requerida </ span>');
define ('ENTRY_COUNTRY', 'Country:');
define ('ENTRY_COUNTRY_ERROR', 'Ha de seleccionar un país dels Països del menú desplegable.');
define ('ENTRY_TELEPHONE_NUMBER', 'Número de telèfon:');
define ('ENTRY_TELEPHONE_NUMBER_ERROR' , '  <span class = "textoError"> min' .ENTRY_TELEPHONE_MIN_LENGTH.' caràcters </ span>');
define ('ENTRY_FAX_NUMBER', 'Nombre de fax:');
define ('ENTRY_NEWSLETTER', 'Butlletí:');
define ('ENTRY_NEWSLETTER_YES ',' Subscrit ');
define ('ENTRY_NEWSLETTER_NO', 'no subscriure');

// Imatges
define ('IMAGE_ANI_SEND_EMAIL ',' Enviament de correu electrònic');
define ('IMAGE_BACK', 'Volver');
define ('IMAGE_BACKUP '," còpia de seguretat ");
define ('IMAGE_CANCEL', 'Cancel·la');
define ('IMAGE_CONFIRM', 'Confirmar');
define ('IMAGE_COPY', 'Copy');
define ('IMAGE_COPY_TO', 'Copia a');
define ('image_details', 'Detalls');
define ('IMAGE_DELETE', 'Eliminar');
define ('IMAGE_EDIT', 'Edita');
define ('IMAGE_EMAIL', 'Correu electrònic');
define ('IMAGE_EXPORT', 'exportar ');
define ('IMAGE_ICON_STATUS_GREEN', 'Activa');
define ('IMAGE_ICON_STATUS_GREEN_LIGHT', 'Set Activa');
define ('IMAGE_ICON_STATUS_RED', 'Inactiu');
define ('IMAGE_ICON_STATUS_RED_LIGHT', 'Set Inactiu');
define ('IMAGE_ICON_INFO', 'Informació');
define ('IMAGE_INSERT', 'Insereix');
define ('IMAGE_LOCK', 'Lock');
define ('IMAGE_MODULE_INSTALL', 'Instal·lar mòdul');
define ('IMAGE_MODULE_REMOVE', 'Eliminar Mòdul');
define ('IMAGE_MOVE', 'Move');
define ('IMAGE_NEW_BANNER', 'Nou Banner');
define ('IMAGE_NEW_CATEGORY', 'Nova categoria');
define ('IMAGE_NEW_COUNTRY '," Nou País ");
define ('IMAGE_NEW_CURRENCY', 'Nova moneda');
define ('IMAGE_NEW_FILE', 'New File');
define ('IMAGE_NEW_FOLDER', 'Nova carpeta');
define ('IMAGE_NEW_LANGUAGE '," nou llenguatge ");
define ('IMAGE_NEW_NEWSLETTER', 'Nova informació');
define ('IMAGE_NEW_PRODUCT', 'Nou producte');
define ('IMAGE_NEW_TAX_CLASS '," Nova Classe d&#237;Impost ");
define ('IMAGE_NEW_TAX_RATE', 'nou tipus impositiu');
define ('IMAGE_NEW_TAX_ZONE', 'Nova Zona Tributària');
define ('IMAGE_NEW_ZONE', 'Nova Zona ');
define ('IMAGE_ORDERS ',' Ordres ');
define ('IMAGE_ORDERS_INVOICE', 'Factura');
define ('IMAGE_ORDERS_PACKINGSLIP ',' llista de presència');
define ('IMAGE_PREVIEW', 'Vista prèvia');
define ('IMAGE_RESTORE', 'Restaura');
define ('IMAGE_RESET', 'reset');
define ('IMAGE_SAVE', 'Save');
define ('IMAGE_SEARCH', 'Cerca');
define ('IMAGE_SELECT', 'Selecciona');
define ('IMAGE_SEND', 'Enviar');
define ('IMAGE_SEND_EMAIL ',' enviar consulta ');
define ('IMAGE_UNLOCK', 'Desbloqueja');
define ('IMAGE_UPDATE',  'l&#39;actualització');
define ('IMAGE_UPDATE_CURRENCIES ','Actualització dels Tipus de Canvi');
define ('IMAGE_UPLOAD', 'Pujar');

define ('ICON_CROSS', 'False');
define ('ICON_CURRENT_FOLDER ',' Carpeta actual');
define ('ICON_DELETE', 'Eliminar');
define ('ICON_ERROR', 'Error');
define ('icon_file', 'Arxiu');
define ('ICON_FILE_DOWNLOAD', 'Descarregar');
define ('ICON_FOLDER', 'Carpeta');
define ('ICON_LOCKED', 'Locked');
define ('ICON_PREVIOUS_LEVEL', 'Nivell Anterior');
define ('ICON_PREVIEW', 'Vista prèvia');
define ('ICON_STATISTICS', 'Estadístiques');
define ('ICON_SUCCESS', 'Èxit');
define ('ICON_TICK', 'True');
define ('ICON_UNLOCKED', 'desbloquejat');
define ('ICON_WARNING', 'Notes');


// constants for use in tep_prev_next_display function
define ('TEXT_RESULT_PAGE', 'Pàgina% s de% d');
define ('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> banderes)');
define ('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> països)');
define ('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> els clients)');
define ('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> monedes)');
define ('TEXT_DISPLAY_NUMBER_OF_ENTRIES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> entrades)');
define ('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> idiomes)');
define ('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> fabricants)');
define ('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> butlletins)');
define ('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> ordres)');
define ('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> ordres d&#237;estat)');
define ('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> productes)');
define ('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> productes espera)');
define ('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> comentari)');
define ('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> productes especialment)');
define ('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> classes d&#237;impostos)');
define ('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> zones fiscals)');
define ('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> les taxes d&#237;impostos)');
define ('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Veient <strong>% d </ strong> <strong>% d </ strong> (de <strong>% d </ strong> zones)');

define ('PREVNEXT_BUTTON_PREV', '>>');
define ('PREVNEXT_BUTTON_NEXT', '>>');

define ('TEXT_DEFAULT', 'default');
define ('TEXT_SET_DEFAULT ',' Establir com a predeterminat ');
define ('TEXT_FIELD_REQUIRED', ' <span class ="fieldRequired"> * Requerit </ span>');

define ('TEXT_CACHE_CATEGORIES', 'Categories Box');
define ('TEXT_CACHE_MANUFACTURERS', 'Els fabricants Box');
define ('TEXT_CACHE_ALSO_PURCHASED', 'També han Comprat Mòdul');

define ('TEXT_NONE', '--Ninguno--');
define ('TEXT_TOP', 'Top');

define ('ERROR_DESTINATION_DOES_NOT_EXIST', 'Error: Destinació no existeix.');
define ('ERROR_DESTINATION_NOT_WRITEABLE', 'Error: La destinació no pot escriure.');
define ('ERROR_FILE_NOT_SAVED', 'Error: Càrrega de fitxers no desats.');
define ('ERROR_FILETYPE_NOT_ALLOWED', 'Error: File upload tipus no permès.');
define ('SUCCESS_FILE_SAVED_SUCCESSFULLY ',' Èxit: Carrega guardat correctament.');
define ('WARNING_NO_FILE_UPLOADED', 'Avís: No hi ha fitxer enviat.');

// bootstrap helper
define ('MODULE_CONTENT_BOOTSTRAP_ROW_DESCRIPTION', '<p> Ample contingut pot ser de 12 o menys per la columna per fila. </ p> <p> 12/12 = 100% d&#39;ample, ample 6.12 = 50%, 4/12 = 33 . width% </ p> <p> Total de totes les columnes en qualsevol fila ha de ser igual a 12 (per exemple: 3 caixes de 4 columnes cadascuna, 1 caixa de 12 columnes i així successivament). </ p> ');
define('NEW_CUSTOMER', 'Nou Soci');


/*Traduccion textos*/
define('ENTRY_CUSTOMER', 'Socio');
define('ENTRY_SHIPPING_ADDRESS','Adreça de recollida');
define('ENTRY_BILLING_ADDRESS','Adreça de facturació');
define('ENTRY_PAYMENT_METHOD','Metode de Pagament');

define ('BOX_REPORTS_STOCKVIEW', 'Stock minim');