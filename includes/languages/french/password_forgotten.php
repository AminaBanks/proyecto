<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Connexion');
define('NAVBAR_TITLE_2', 'Mot de passe oublié');

define('HEADING_TITLE', 'J\'ai oublié mon mot de passe !');

define('TEXT_MAIN', 'Si vous avez oublié votre mot de passe, entrez votre adresse électronique ci-dessous et nous vous enverrons un courrier électronique contenant les instructions nécessaires au changement de votre mot de passe en toute sécurité.');

define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Erreur : l\'adresse électronique n\'a pas été trouvée dans notre base, veuillez la vérifier et recommencer.');
define('TEXT_PASSWORD_RESET_INITIATED','Merci de vérifier vos courriels afin de prendre connaissance des instructions pour modifier votre mot de passe. Les instructions contiennent un lien qui sera valide durant 24 heures ou jusqu\'à la modification de votre mot de passe.');

define('EMAIL_PASSWORD_RESET_SUBJECT', STORE_NAME . ' - Nouveau mot de passe');
define('EMAIL_PASSWORD_RESET_BODY', 'Un nouveau mot de passe a été demandé pour votre compte client chez ' . STORE_NAME . '.' . "\n\n" . 'Merci de cliquer sur le lien suivant afin de modifier votre mot de passe en toute sécurité :' . "\n\n" . '%s' . "\n\n" . 'Ce lien sera automatiquement invalide après 24h si vous n\'avez pas modifié votre mot de passe.' . "\n\n" . 'Pour toute aide complémentaire, veuillez contacter le propriétaire de la boutique à l\'adresse suivante :' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");

define('ERROR_ACTION_RECORDER' ,'Erreur : une demande de modification de mot de passe contenant les instructions pour le faire vous a déjà été envoyée par email. Merci de renouveler votre demande dans %s minutes.');
?>