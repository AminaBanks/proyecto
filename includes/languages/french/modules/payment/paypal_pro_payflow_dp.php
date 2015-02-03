<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TEXT_TITLE', 'Site PayPal Pro (Payflow Edition) - Paiements Directs');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TEXT_PUBLIC_TITLE', 'Carte de paiement ou de crédit');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_TEXT_DESCRIPTION', '<strong>NB : le module PayPal Pro (Payflow Edition) - Paiements Directs nécessite que le module Paypal Express soit activé pour fonctionner.</strong><br /><br /><img src="images/icon_popup.gif" border="0">&nbsp;<a href="https://www.paypal.com/mrb/pal=PS2X9Q773CKG4" target="_blank" style="text-decoration: underline; font-weight: bold;">Site PayPal</a>&nbsp;<a href="javascript:toggleDivBlock(\'paypalDirectUKInfo\');">(info)</a><span id="paypalDirectUKInfo" style="display: none;"><br /><i>Utilisez le lien ci-dessus pour faire bénéficier osCommerce d\'une petite commission pour l\'apport d\'un nouveau client Paypal.</i></span>');

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_EXPRESS_MODULE', 'PayPal mandates the PayPal Express Checkout (Payflow Edition) payment module be enabled if this module is to be activated. This module will not load until the PayPal Express Checkout (Payflow Edition) module has been installed.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_ADMIN_CURL', 'This module requires cURL to be enabled in PHP and will not load until it has been enabled on this webserver.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_ADMIN_CONFIGURATION', 'This module will not load until the Vendor and Password parameters have been configured. Please edit and configure the settings of this module.');

  #define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_OWNER', 'Titulaire de la carte :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_OWNER_FIRSTNAME', 'Prénom sur la carte :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_OWNER_LASTNAME', 'Nom sur la carte :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_TYPE', 'Type de carte :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_NUMBER', 'N° de carte :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_VALID_FROM', 'Date de début de validité :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_VALID_FROM_INFO', '(si disponible)');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_EXPIRES', 'Date d\'expiration :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_CVC', 'Code de contrôle visuel (CVV2) :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_ISSUE_NUMBER', 'N° de carte spécial :');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_CARD_ISSUE_NUMBER_INFO', '(Pour les cartes Maestro et Solo seulement)');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_ALL_FIELDS_REQUIRED', 'Erreur : toutes les informations demandées sont requises.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_GENERAL', 'Erreur : un problème est intervenu durant l\'opération. Ré-essayez.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_CFG_ERROR', 'Erreur : configuration du module. Vérifiez le login ou le compte accrédité.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_ADDRESS', 'Erreur : des différences dans l\'adresse de livraison ont été remarquées : rue, ville, code postal ou pays. Ré-essayez.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_DECLINED', 'Erreur : transaction refusée. Ré-essayez.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_ERROR_INVALID_CREDIT_CARD', 'Erreur : les informations de la carte sont erronées. Recommencez.');

  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_LINK_TITLE', 'Test API Server Connection');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_TITLE', 'API Server Connection Test');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_GENERAL_TEXT', 'Testing connection to server..');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_BUTTON_CLOSE', 'Close');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_TIME', 'Connection Time:');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_SUCCESS', 'Success!');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_FAILED', 'Failed! Please review the Verify SSL Certificate settings and try again.');
  define('MODULE_PAYMENT_PAYPAL_PRO_PAYFLOW_DP_DIALOG_CONNECTION_ERROR', 'An error occurred. Please refresh the page, review your settings, and try again.');
?>
