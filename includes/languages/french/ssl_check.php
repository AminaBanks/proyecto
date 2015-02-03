<?php
/*
  $Id: ssl_check.php $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Contrôle de la sécurité');
define('HEADING_TITLE', 'Contrôle de la sécurité.');

define('TEXT_INFORMATION', 'Nous avons détecté que votre navigateur a généré une session SSL différente de l\'ID employé dans nos pages sécurisées.<br /><br />Pour des mesures de sécurité vous devrez à nouveau vous connecter à votre compte.<br /><br />Quelques navigateurs comme Konqueror 3.1 n\'ont pas la capacité de générer un identifiant de session sécurisé. Si vous utilisez un tel navigateur, nous vous recommandons de changer de navigateur : <a href="http://www.microsoft.com/ie/" target="_blank">Microsoft Internet Explorer</a>, <a href="http://channels.netscape.com/ns/browsers/download_other.jsp" target="_blank">Netscape</a>, ou <a href="http://www.mozilla.org/releases/" target="_blank">Mozilla</a>, pour continuer vos achats en ligne.<br /><br />Nous avons pris cette mesure de sécurité pour protéger vos informations personnelles et nous sommes navrés des désagréments encourus.<br /><br />Entrez en contact avec le gestionnaire du site pour plus d\'informations sur ce sujet.');

define('BOX_INFORMATION_HEADING', 'Vie privée et sécurité');
define('BOX_INFORMATION', 'Nous validons la session SSL ID automatiquement produite par votre navigateur à chaque demande de page sécurisée faite à ce serveur.<br /><br />Cette validation assure que votre identité ne peut pas être usurpée durant votre navigation.');
?>