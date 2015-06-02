<?php


// look in your $PATH_LOCALE/locale directory for available locales
// or type locale -a on the server.
// Examples:
// on RedHat try 'ca_ES'
// on FreeBSD try 'ca_ES.ISO_8859-1'
// on Windows try 'ca', or 'Catalan'
header('Content-Type: text/html; charset=utf-8');

@setlocale(LC_TIME, 'ca_ES.UTF-8');

define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y');  // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
define('LANGUAGE_CURRENCY', 'EUR');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="ca"');

// charset for web pages and emails
define('CHARSET', 'UTF-8');

// page title
define('TITLE', STORE_NAME);

// header text in includes/header.php
define('HEADER_TITLE_CREATE_ACCOUNT', 'Crea un Compte');
define('HEADER_TITLE_MY_ACCOUNT', 'El meu compte');
define('HEADER_TITLE_CART_CONTENTS', 'Veure la Cistella');
define('HEADER_TITLE_CHECKOUT', 'Realitza la Comanda');
define('HEADER_TITLE_TOP', 'Inici');
define('HEADER_TITLE_CATALOG', 'Cat&agrave;leg');
define('HEADER_TITLE_LOGOFF', 'Surt');
define('HEADER_TITLE_LOGIN', 'Entra');
define('HEADER_TITLE_HOME', 'Home');
define ('HEADER_TITLE_NAME_PRODUCTS', 'Productes');
define('HEADER_L','I:');
define('HEADER_LANG','Idioma');
define ('LANGUAGE_1','Catal&#x000E0; (ca)');
define ('LANGUAGE_2','Espa&#x000F1;ol (es)');
define ('LANGUAGE_3','English (en)');
define ('LANGUAGE_4','Fran&#x000E7;ais (fr)');


// footer text in includes/footer.php
define('FOOTER_TEXT_REQUESTS_SINCE', 'peticions des de');

// text for gender
define('MALE', 'Home');
define('FEMALE', 'Dona');
define('MALE_ADDRESS', 'Sr.');
define('FEMALE_ADDRESS', 'Sra.');

// text for date of birth example
define('DOB_FORMAT_STRING', 'dd/mm/aaaa');

// categories box text in includes/boxes/categories.php
define('BOX_HEADING_CATEGORIES', 'Categories');

// manufacturers box text in includes/boxes/manufacturers.php
define('BOX_HEADING_MANUFACTURERS', 'Fabricants');

// whats_new box text in includes/boxes/whats_new.php
define('BOX_HEADING_WHATS_NEW', 'Novetats');

// quick_find box text in includes/boxes/quick_find.php
define('BOX_HEADING_SEARCH', 'Cerca R&agrave;pida');
define('BOX_SEARCH_TEXT', 'Utilitzeu paraules clau per trobar el producte que busqueu.');
define('BOX_SEARCH_ADVANCED_SEARCH', 'Cerca Avan&ccedil;ada');

// specials box text in includes/boxes/specials.php
define('BOX_HEADING_SPECIALS', 'Ofertes');

// reviews box text in includes/boxes/reviews.php
define('BOX_HEADING_REVIEWS', 'Comentaris');
define('BOX_REVIEWS_WRITE_REVIEW', 'Escriviu un comentari per aquest producte');
define('BOX_REVIEWS_NO_REVIEWS', 'En aquest moment, no hi ha cap comentari');
define('BOX_REVIEWS_TEXT_OF_5_STARS', '%s de 5 Estrelles!');

// shopping_cart box text in includes/boxes/shopping_cart.php
define('BOX_HEADING_SHOPPING_CART', 'Compres');
define('BOX_SHOPPING_CART_EMPTY', '0 productes');

// order_history box text in includes/boxes/order_history.php
define('BOX_HEADING_CUSTOMER_ORDERS', 'Les meves comandes');

// best_sellers box text in includes/boxes/best_sellers.php
define('BOX_HEADING_BESTSELLERS', 'Els M&eacute;s Venuts');
define('BOX_HEADING_BESTSELLERS_IN', 'Els M&eacute;s Venuts a <br>&nbsp;&nbsp;');

// notifications box text in includes/boxes/products_notifications.php
define('BOX_HEADING_NOTIFICATIONS', 'Notificacions');
define('BOX_NOTIFICATIONS_NOTIFY', 'Notifiqueu-me canvis a <b>%s</b>');
define('BOX_NOTIFICATIONS_NOTIFY_REMOVE', 'No em notifiqueu canvis a <b>%s</b>');

// manufacturer box text
define('BOX_HEADING_MANUFACTURER_INFO', 'Fabricant');
define('BOX_MANUFACTURER_INFO_HOMEPAGE', 'P&agrave;gina de %s');
define('BOX_MANUFACTURER_INFO_OTHER_PRODUCTS', 'Altres productes');

// languages box text in includes/boxes/languages.php
define('BOX_HEADING_LANGUAGES', 'Idiomes');

// currencies box text in includes/boxes/currencies.php
define('BOX_HEADING_CURRENCIES', 'Monedes');

// information box text in includes/boxes/information.php
define('BOX_HEADING_INFORMATION', 'Informaci&oacute;');
define('BOX_INFORMATION_PRIVACY', 'Confidencialitat');
define('BOX_INFORMATION_CONDITIONS', 'Condicions d\'&uacute;s');
define('BOX_INFORMATION_SHIPPING', 'Enviaments/Devolucions');
define('BOX_INFORMATION_CONTACT', 'Contacteu-nos');

// tell a friend box text in includes/boxes/tell_a_friend.php
define('BOX_HEADING_TELL_A_FRIEND', 'Digueu-li a un Amic');
define('BOX_TELL_A_FRIEND_TEXT', 'Envieu aquesta p&agrave;gina a un amic amb un comentari.');

// checkout procedure text
define('CHECKOUT_BAR_DELIVERY', 'lliurament');
define('CHECKOUT_BAR_PAYMENT', 'pagament');
define('CHECKOUT_BAR_CONFIRMATION', 'confirmaci&oacute;');
define('CHECKOUT_BAR_FINISHED', 'finalitzat!');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Seleccioneu');
define('TYPE_BELOW', 'Escriviu a sota');

// javascript messages
define('JS_ERROR', 'Hi ha errors al vostre formulari!\nSi us plau, feu les seg&uuml;ents correccions:\n\n');

define('JS_REVIEW_TEXT', '* El vostre \'Comentari\' ha de tenir almenys ' . REVIEW_TEXT_MIN_LENGTH . ' lletres.\n');
define('JS_REVIEW_RATING', '* Heu d\'avaluar el producte sobre el que opineu.\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Si us plau, seleccioneu un m&egrave;tode de pagament per la vostra comanda.\n');

define('JS_ERROR_SUBMITTED', 'Ja heu enviat el formulari. Premeu Accepta i espereu a que acabi el proc&eacute;s.');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Si us plau, seleccioneu un m&egrave;tode de pagament per la vostra comanda.');

define('CATEGORY_COMPANY', 'Empresa');
define('CATEGORY_PERSONAL', 'Personal');
define('CATEGORY_ADDRESS', 'Adre&ccedil;a');
define('CATEGORY_CONTACT', 'Contacte');
define('CATEGORY_OPTIONS', 'Opcions');
define('CATEGORY_PASSWORD', 'Contrasenya');

define('ENTRY_COMPANY', 'Empresa:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Sexe:');
define('ENTRY_GENDER_ERROR', 'Si us plau, seleccioneu una opci&oacute;.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Nom:');
define('ENTRY_FIRST_NAME_ERROR', 'El vostre nom ha de tenir almenys ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' lletres.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Cognoms:');
define('ENTRY_LAST_NAME_ERROR', 'Els vostres cognoms han de tenir almenys ' . ENTRY_LAST_NAME_MIN_LENGTH . ' lletres.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Data de naixement:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'La vostra data de naixement ha de ser en aquest format: DD/MM/AAAA (p.ex. 21/05/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (p.ex. 21/05/1970)');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'La vostra adre&ccedil;a d\'E-Mail ha de tenir almenys ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' lletres.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'La vostra adre&ccedil;a d\'E-Mail no sembla v&agrave;lida - si us plau, feu els canvis necessaris.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'La vostra adre&ccedil;a d\'E-Mail ja figura a la nostra base de dades de clients - podeu entrar a la vostra compta amb aquesta adre&ccedil; o crear un compte nou amb una adre&ccedil;a diferent.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Adre&ccedil;a:');
define('ENTRY_STREET_ADDRESS_ERROR', 'La vostra adre&ccedil;a ha de tenir almenys ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' lletres.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Barri');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Codi postal:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><font color="#FF0000">mínim ' . ENTRY_POSTCODE_MIN_LENGTH . ' lletres</font></small>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small><font color="#5b4026">obligatori</font></small>');
define('ENTRY_CITY', 'Poblaci&oacute;:');
define('ENTRY_CITY_ERROR', '&nbsp;<small><font color="#FF0000">m&iacute;nim ' . ENTRY_CITY_MIN_LENGTH . ' lletres</font></small>');
define('ENTRY_CITY_TEXT', '&nbsp;<small><font color="#5b4026">obligatori</font></small>');
define('ENTRY_STATE', 'Prov&iacute;ncia:');
define('ENTRY_STATE_ERROR', '&nbsp;<small><font color="#FF0000">obligatori</font></small>');
define('ENTRY_STATE_ERROR_SELECT', 'Si us plau, seleccioneu de la llista desplegable.');
define('ENTRY_STATE_TEXT', '&nbsp;<small><font color="#5b4026">obligatori</font></small>');
define('ENTRY_COUNTRY', 'Pa&iacute;s:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small><font color="#5b4026">obligatori</font></small>');
define('ENTRY_TELEPHONE_NUMBER', 'Tel&egrave;fon:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><font color="#FF0000">m&iacute;nim ' . ENTRY_TELEPHONE_MIN_LENGTH . ' lletres</font></small>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small><font color="#5b4026"></font></small>');
define('ENTRY_FAX_NUMBER', 'Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Butllet&iacute; de not&iacute;cies:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'em vull subscriure');
define('ENTRY_NEWSLETTER_NO', 'no vull subscriure\'m');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Contrasenya:');
define('ENTRY_PASSWORD_ERROR', 'La vostra contrasenya ha de tenir almenys ' . ENTRY_PASSWORD_MIN_LENGTH . ' lletres.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'La confirmaci&oacute; de la contrasenya ha de ser igual que la contrasenya.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmeu la contrasenya:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Contrasenya Actual:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'La vostra contrasenya ha de tenir almenys ' . ENTRY_PASSWORD_MIN_LENGTH . ' lletres.');
define('ENTRY_PASSWORD_NEW', 'Contrasenya nova:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'La vostra contrasenya ha de tenir almenys ' . ENTRY_PASSWORD_MIN_LENGTH . ' lletres.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'La confirmaci&oacute; de la contrasenya ha de ser igual que la contrasenya.');
define('PASSWORD_HIDDEN', '--OCULT--');

define('FORM_REQUIRED_INFORMATION', '');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'P&agrave;gines de resultats:');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Veient del <b>%d</b> al <b>%d</b> (de <b>%d</b> productes)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Veient del <b>%d</b> al <b>%d</b> (de <b>%d</b> comandes)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Veient del <b>%d</b> al <b>%d</b> (de <b>%d</b> comentaris)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', 'Veient del <b>%d</b> al <b>%d</b> (de <b>%d</b> productes nous)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Veient del <b>%d</b> al <b>%d</b> (de <b>%d</b> ofertes)');

define('PREVNEXT_TITLE_FIRST_PAGE', 'Comen&ccedil;ament');
define('PREVNEXT_TITLE_PREVIOUS_PAGE', 'Anterior');
define('PREVNEXT_TITLE_NEXT_PAGE', 'Seg&uuml;ent');
define('PREVNEXT_TITLE_LAST_PAGE', 'Final');
define('PREVNEXT_TITLE_PAGE_NO', 'P&agrave;gina %d');

define('TEXT_VIEW', 'Vista: ');
define('TEXT_VIEW_LIST', ' Llista');
define('TEXT_VIEW_GRID', ' Quadr&#x000ED;cula');

define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', '%d p&agrave;gines anteriors');
define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', '%d p&agrave;gines seg&uuml;ents');
define('PREVNEXT_BUTTON_FIRST', '&lt;&lt;INICI');
define('PREVNEXT_BUTTON_PREV', '[&lt;&lt;&nbsp;Anterior]');
define('PREVNEXT_BUTTON_NEXT', '[Seg&uuml;ent&nbsp;&gt;&gt;]');
define('PREVNEXT_BUTTON_LAST', 'FINAL&gt;&gt;');


// grid/list
define('TEXT_SORT_BY', 'Ordenar per ');

define('SMALL_IMAGE_BUTTON_BUY', 'Compra');

define('IMAGE_BUTTON_ADD_ADDRESS', 'Afegeix l\'adre&ccedil;a');
define('IMAGE_BUTTON_ADDRESS_BOOK', 'Adreces');
define('IMAGE_BUTTON_BACK', 'Enrere');
define('IMAGE_BUTTON_BUY_NOW', 'Compra');
define('IMAGE_BUTTON_CHANGE_ADDRESS', 'Canvia l\'adre&ccedil;a');
define('IMAGE_BUTTON_CHECKOUT', 'Realitza la comanda');
define('REVIEWS_TEXT_AVERAGE', 'Mitjana de la classificaci&#x000F3;  <span itemprop="count">%s</span> opini&#x000F3; (s) %s');
define('IMAGE_BUTTON_CONFIRM_ORDER', 'Confirma la comanda');
define('IMAGE_BUTTON_CONTINUE', 'Continua');
define('IMAGE_BUTTON_CONTINUE_SHOPPING', 'Continua comprant');
define('IMAGE_BUTTON_DELETE', 'Suprimeix');
define('IMAGE_BUTTON_EDIT_ACCOUNT', 'Edita el compte');
define('IMAGE_BUTTON_HISTORY', 'Historial de comandes');
define('IMAGE_BUTTON_LOGIN', 'Signa');
define('IMAGE_BUTTON_IN_CART', 'Afegeix a la cistella');
define('IMAGE_BUTTON_NOTIFICATIONS', 'Avisos');
define('IMAGE_BUTTON_QUICK_FIND', 'Cerca r&agrave;pida');
define('IMAGE_BUTTON_REMOVE_NOTIFICATIONS', 'Suprimeix els avisos');
define('IMAGE_BUTTON_REVIEWS', 'Comentaris');
define('IMAGE_BUTTON_SEARCH', 'Cerca');
define('IMAGE_BUTTON_SHIPPING_OPTIONS', 'Opcions d\'enviament');
define('IMAGE_BUTTON_TELL_A_FRIEND', 'Digueu-li a un amic/ga');
define('IMAGE_BUTTON_UPDATE', 'Actualitza');
define('IMAGE_BUTTON_UPDATE_CART', 'Actualiza la cistella');
define('IMAGE_BUTTON_WRITE_REVIEW', 'Escriviu un comentari');

define('SMALL_IMAGE_BUTTON_DELETE', 'Elimina');
define('SMALL_IMAGE_BUTTON_EDIT', 'Modifica');
define('SMALL_IMAGE_BUTTON_VIEW', 'Visualitza');

define('ICON_ARROW_RIGHT', 'm&eacute;s');
define('ICON_CART', 'A la Cistella');
define('ICON_ERROR', 'Error');
define('ICON_SUCCESS', 'Correcte');
define('ICON_WARNING', 'Advert&egrave;ncia');

define('TEXT_GREETING_PERSONAL', 'Hola <span class="greetUser">%s</span>? &iquest;T\'agradaria veure quins <a href="%s"><u>nous productes</u></a> hi ha?');
define('TEXT_GREETING_PERSONAL_RELOGON', '<small>Si no ets el/la %s, si us plau <a href="%s"><u>entra aqu&iacute;</u></a> i introdueix les teves dades.</small>');
define('TEXT_GREETING_GUEST', 'Benvingut/da <span class="greetUser">visitant!</span> &iquest;T\'agradaria <a href="%s"><u>entrar al teu compte</u></a> o prefereixes <a href="%s"><u>crear un compte nou</u></a>?');

define('TEXT_SORT_PRODUCTS', 'Ordena els productes ');
define('TEXT_DESCENDINGLY', 'Descendentment');
define('TEXT_ASCENDINGLY', 'Ascendentment');
define('TEXT_BY', ' per ');

define('TEXT_REVIEW_BY', 'de %s');
define('TEXT_REVIEW_WORD_COUNT', '%s paraules');
define('TEXT_REVIEW_RATING', 'Avaluaci&oacute;: %s [%s]');
define('TEXT_REVIEW_DATE_ADDED', 'Data d\'alta: %s');
define('TEXT_NO_REVIEWS', 'En aquest moment no hi ha cap comentari.');

define('TEXT_NO_NEW_PRODUCTS', 'Ara mateix no hi ha novetats.');

define('TEXT_UNKNOWN_TAX_RATE', 'Impost desconegut');

define('TEXT_REQUIRED', '<span class="errorText">Obligatori</span>');

define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>TEP ERROR:</small> No he pogut enviar el missatge amb el servidor SMTP especificat. Configureu el vostre servidor SMTP a la secci&oacute; adequada del fitxer php.ini.</b></font>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'Atenci&oacute;! el directori d\'instal·laci&oacute; ja existeix a: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. Si us plau, esborreu aquest directori per raons de seguretat.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'Atenci&oacute;! s&oacute;c capa&ccedil; d\'escriure al fitxer de configuraci&oacute;: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. Aix&ograve; &eacute;s un risc potencial de seguretat - si us plau, poseu els permisos d\'usuari adequats en aquest fitxer.');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Atenci&oacute;! el directori de les sessions no existeix: ' . tep_session_save_path() . '. Les sessions no funcionaran fins que es crei aquest directori!');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Atenci&oacute;! No s&oacute;c capaç d\'escriure al directori de les sessions: ' . tep_session_save_path() . '. Les sessions no funcionaran fins que s\'estableixin els permisos d\'usuari adequats.');
define('WARNING_SESSION_AUTO_START', 'Atenci&oacute;! session.auto_start est&agrave; activat - si us plau desactiveu aquesta caracter&iacute;stica de PHP al fitxer php.ini i reinicieu el servidor web.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Advert&egrave;ncia: El directori per productes descarregables no existeix: ' . DIR_FS_DOWNLOAD . '. Els productes descarregables no funcionaran fins que no es corregeixi aquest error.');

define('TEXT_CCVAL_ERROR_INVALID_DATE', 'La data de caducitat de la targeta de cr&egrave;dit &eacute;s incorrecta.<br>Comproveu la data i torneu a intentar-ho, si us plau.');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'El n&uacute;mero de la targeta de cr&egrave;dit &eacute;s incorrecte.<br>Comproveu el n&uacute;mero i torneu a intentar-ho, si us plau.');
define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'Els quatre primers d&iacute;gits de la vostra targeta s&oacute;n: %s<br>Si aquest n&uacute;mero &eacute;s correcte, no acceptem aquest tipus de targetes.<br>En cas de ser incorrecte, torneu a intentar-ho, si us plau.');

define('FOOTER_TEXT_BODY', 'Copyright &copy; ' . date('Y') . ' <a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . STORE_NAME . '</a><br>E-Botiga gr&agrave;cies a <a href="http://www.oscommerce.com" target="_blank">osCommerce</a>');

/*Creation del MENU Y SU TRADUCCION */
define ('M_CATEGORY','CATEGORIA');
//define ('M_MANUFACTURER','FABRICANT'); ***********************Cambiar de Fabricantes a paisosa esta linea
define ('M_MANUFACTURER','PA&#x000CF;SOS');
define ('M_CONTACT','CONTACTE');
define ('MODULE_BOXES_INFORMATION_BOX_CONTACT','Contacte');
define ('MODULE_BOXES_INFORMATION_BOX_CONDITIONS','Condicions');
define ('MODULE_BOXES_INFORMATION_BOX_PRIVACY', 'Privacitat');

define('FORM_REQUIRED_INFORMATION', '<span class="glyphicon glyphicon-asterisk inputRequirement"></span> Required information');
define('FORM_REQUIRED_INPUT', '<span><span class="glyphicon glyphicon-asterisk form-control-feedback inputRequirement"></span></span>');


//BORRAR CESTA Y A—ADIR CESTA
define ('PRODUCT_SUBSCRIBED', '% s ha estat afegit a la seva llista de notificacions');
define ('PRODUCT_UNSUBSCRIBED', "% s s'ha eliminat de la seva llista de notificacions");
define ('PRODUCT_ADDED', '% s ha estat afegit a la cistella');
define ('PRODUCT_REMOVED', "% s s'ha eliminat del seu carro ");
define('IMAGE_BUTTON_EMAIL', 'Enviar Correu');
//NUEVA CREACION 
define ('NEW_CUSTOMER', 'NOVA SOL-LICITUD ARTESANIA.');
define ('MESSAGE_CLIENT','Estimat Soci, <br>Dins de 24 hores, rebr‡ un correu electrÚnic amb les seves dades per iniciar sessiÛ en artesaniafundacioproide.org<br> Gr‡cies <br>PROIDE');
define('IMAGE_BUTTON_EXIT', 'sortir');
?>
