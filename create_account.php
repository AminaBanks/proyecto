<?php

header('Content-Type: text/html; charset=utf-8');

require('includes/application_top.php');
$process = false;

if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process'))
{
 $process = true;
 $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
    $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
   /* if (ACCOUNT_DOB == 'true') $dob = tep_db_prepare_input($HTTP_POST_VARS['dob']);*/
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    /*if (ACCOUNT_COMPANY == 'true') $company = tep_db_prepare_input($HTTP_POST_VARS['company']);*/
    /*$street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
    $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
    $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
    if (ACCOUNT_STATE == 'true') {
      $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
      if (isset($HTTP_POST_VARS['zone_id'])) {
        $zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
      } else {
        $zone_id = false;
      }
    }
    $country = tep_db_prepare_input($HTTP_POST_VARS['country']);*/
    $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
    $fax = tep_db_prepare_input($HTTP_POST_VARS['fax']);
  $error = false;
  
  // verficar datos
   if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_FIRST_NAME_ERROR);
    }

    if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_LAST_NAME_ERROR);
    }
	
	$school = tep_db_prepare_input($HTTP_POST_VARS['school']);    
	//echo $school;
 

    /*if (ACCOUNT_DOB == 'true') {
      if ((strlen($dob) < ENTRY_DOB_MIN_LENGTH) || (!empty($dob) && (!is_numeric(tep_date_raw($dob)) || !@checkdate(substr(tep_date_raw($dob), 4, 2), substr(tep_date_raw($dob), 6, 2), substr(tep_date_raw($dob), 0, 4))))) {
        $error = true;

        $messageStack->add('create_account', ENTRY_DATE_OF_BIRTH_ERROR);
      }
    }*/

    if (strlen($email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_EMAIL_ADDRESS_ERROR);
    } elseif (tep_validate_email($email_address) == false) {
      $error = true;

      $messageStack->add('create_account', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    } else {
      $check_email_query = tep_db_query("select count(*) as total from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
      $check_email = tep_db_fetch_array($check_email_query);
      if ($check_email['total'] > 0) {
        $error = true;

        $messageStack->add('create_account', ENTRY_EMAIL_ADDRESS_ERROR_EXISTS);
      }
    }
/*
    if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_STREET_ADDRESS_ERROR);
    }

    if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_POST_CODE_ERROR);
    }

    if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_CITY_ERROR);
    }

    if (is_numeric($country) == false) {
      $error = true;

      $messageStack->add('create_account', ENTRY_COUNTRY_ERROR);
    }

    if (ACCOUNT_STATE == 'true') {
      $zone_id = 0;
      $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "'");
      $check = tep_db_fetch_array($check_query);
      $entry_state_has_zones = ($check['total'] > 0);
      if ($entry_state_has_zones == true) {
        $zone_query = tep_db_query("select distinct zone_id from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' and (zone_name = '" . tep_db_input($state) . "' or zone_code = '" . tep_db_input($state) . "')");
        if (tep_db_num_rows($zone_query) == 1) {
          $zone = tep_db_fetch_array($zone_query);
          $zone_id = $zone['zone_id'];
        } else {
          $error = true;

          $messageStack->add('create_account', ENTRY_STATE_ERROR_SELECT);
        }
      } else {
        if (strlen($state) < ENTRY_STATE_MIN_LENGTH) {
          $error = true;

          $messageStack->add('create_account', ENTRY_STATE_ERROR);
        }
      }
    }*/

    if (strlen($telephone) < ENTRY_TELEPHONE_MIN_LENGTH) {
      $error = true;

      $messageStack->add('create_account', ENTRY_TELEPHONE_NUMBER_ERROR);
    }
	// correo al admin e la pagina

	//Load PHPMailer dependencies
require_once 'PHPMailerAutoload.php';
require_once 'class.phpmailer.php';
require_once 'class.smtp.php';

/* CONFIGURATION */
		$crendentials = array(
							'email'     => 'aminata.bangoura@gracia.lasalle.cat',    //Your GMail adress aminata.bangoura@gracia.lasalle.cat
							'password'  => 'BoboSylla86'								//********* HELENA MOT DE PASSE ''               //Your GMail password
							);


/* SPECIFIC TO GMAIL SMTP */
$smtp = array(

'host' => 'smtp.office365.com',
'port' => 587,
'username' => $crendentials['email'],
'password' => $crendentials['password'],
'secure' => 'tls' //SSL or TLS

);

/* TO, SUBJECT, CONTENT */
$to         = 'aminata.bangoura@gracia.lasalle.cat'; //The 'To' field
$subject    = NEW_CUSTOMER;
$content    = ENTRY_FIRST_NAME.$firstname."<br>".ENTRY_LAST_NAME.$lastname."<br>"/*.ENTRY_DATE_OF_BIRTH.$dob*/."<br>".ENTRY_EMAIL_ADDRESS.$email_address."<br>"/*.ENTRY_STREET_ADDRESS.$street_address."<br>".ENTRY_COMPANY.$company."<br>".ENTRY_CITY.$city."<br>".ENTRY_POST_CODE.$postcode."<br>".ENTRY_STATE.$state."<br>"*/.ENTRY_TELEPHONE_NUMBER.$telephone."<br>".ENTRY_COLLEGE.$school."<br>";


$mailer = new PHPMailer();

//SMTP Configuration
$mailer->isSMTP();
$mailer->SMTPAuth   = true; //We need to authenticate
$mailer->Host       = $smtp['host'];
$mailer->Port       = $smtp['port'];
$mailer->Username   = $smtp['username'];
$mailer->Password   = $smtp['password'];
$mailer->SMTPSecure = $smtp['secure']; 

//Now, send mail :
//From - To :
$mailer->From       = $crendentials['email'];
$mailer->FromName   = 'FundacioProide'; //Optional
$mailer->addAddress($to);  // Add a recipient

//Subject - Body :
$mailer->Subject        = $subject;
$mailer->Body           = $content;
$mailer->isHTML(true); //Mail body contains HTML tags

//Check if mail is sent :
if(!$mailer->send()) {
    echo 'Error sending mail : ' . $mailer->ErrorInfo;
} else {
    echo '';
		
}

// correo al cliente que viene de hacer la petición
/* TO, SUBJECT, CONTENT */
$to         = $email_address; //The 'To' field
$subject    = CUSTOMER;
$content    = MESSAGE_CLIENT ;


$mailer = new PHPMailer();

//SMTP Configuration
$mailer->isSMTP();
$mailer->SMTPAuth   = true; //We need to authenticate
$mailer->Host       = $smtp['host'];
$mailer->Port       = $smtp['port'];
$mailer->Username   = $smtp['username'];
$mailer->Password   = $smtp['password'];
$mailer->SMTPSecure = $smtp['secure']; 

//Now, send mail :
//From - To :
$mailer->From       = $crendentials['email'];
$mailer->FromName   = 'FundacioProide'; //Optional
$mailer->addAddress($to);  // Add a recipient

//Subject - Body :
$mailer->Subject        = $subject;
$mailer->Body           = $content;
$mailer->isHTML(true); //Mail body contains HTML tags
if(!$mailer->send()) {
    //echo 'Error sending mail : ' . $mailer->ErrorInfo;
} else {
    //echo 'Message sent !';
	$checking=true;
   tep_redirect(tep_href_link(FILENAME_CREATE_ACCOUNT_SUCCESS, '', 'SSL'));
  
}
}


require(DIR_WS_INCLUDES . 'template_top.php');
echo tep_draw_form('create_account.php', tep_href_link('create_account.php', '', 'SSL'), 'post', 'class="form-horizontal" onsubmit="return check_form(create_account);"', true) . tep_draw_hidden_field('action', 'process');
?>
<div class="contentContainer">

  <h2><?php echo CATEGORY_PERSONAL; ?></h2>
  <div class="contentText">


    <div class="form-group has-feedback">
      <label for="inputFirstName" class="control-label col-xs-3"><?php echo ENTRY_FIRST_NAME; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('firstname', NULL, 'required aria-required="true" id="inputFirstName" placeholder="' . ENTRY_FIRST_NAME . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_FIRST_NAME_TEXT)) echo '<span class="help-block">' . ENTRY_FIRST_NAME_TEXT . '</span>';
        ?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="inputLastName" class="control-label col-xs-3"><?php echo ENTRY_LAST_NAME; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('lastname', NULL, 'required aria-required="true" id="inputLastName" placeholder="' . ENTRY_LAST_NAME . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_LAST_NAME_TEXT)) echo '<span class="help-block">' . ENTRY_LAST_NAME_TEXT . '</span>';
        ?>
      </div>
    </div>
<?php
  //if (ACCOUNT_DOB == 'true') {
?>
    <!--div class="form-group has-feedback">
      <label for="dob" class="control-label col-xs-3"><?php echo ENTRY_DATE_OF_BIRTH; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('dob', '', 'required aria-required="true" id="dob" placeholder="' . ENTRY_DATE_OF_BIRTH . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_DATE_OF_BIRTH_TEXT)) echo '<span class="help-block">' . ENTRY_DATE_OF_BIRTH_TEXT . '</span>';
        ?>
      </div>
    </div-->
<?php
  //}  
?>	
	 <div class="form-group has-feedback">
      <label for="inputCountry" class="control-label col-xs-3"><?php echo ENTRY_COLLEGE; ?></label>
      <div class="col-xs-9">
  <select name="school" required="" aria-required="true" id="school" class="form-control"> 
	<option value="0"></option>
  <option value="La Salle Barceloneta">La Salle Barceloneta </option>
   <option value="La Salle Berga">La Salle Berga</option>
  <option value="La Salle Bonanova">La Salle Bonanova</option>
   <option value="La Salle Cassa">La Salle Cass&#x000E0;</option>
   <option value="La Salle Comptal">La Salle Comtal</option>
   <option value="La Salle Congres">La Salle Congr&#x000E8;s</option>
   <option value= "La Salle Figueras">La Salle Figueres</option>
  <option value= "La Salle Girona">La Salle Girona</option>
   <option value= "La Salle Horta">La Salle Horta</option>
  <option value= "La Salle Gracia">La Salle Gr&#x000E0;cia</option>
   <option value="La Salle La Seu">La Salle La Seu</option>
  <option value="La Salle Manlleu">La Salle Manlleu</option>
   <option value="La Salle Manressa">La Salle Manressa</option>
   <option value="La Salle Mollerousa">La Salle Mollerusa</option>
   <option value="La Salle Montcada">La Salle Montcada</option>
   <option value="La Salle Palamos">La Salle Palam&#x000F3;s</option>
  <option value="La Salle Premia">La Salle Premi&#x000E0;</option>
  <option value="La Salle Reus">La Salle Reus</option>
   <option value="La Salle Sant Celoni">La Salle Sant Celoni</option>
  <option value="La Salle Santa Coloma">La Salle Santa Coloma</option>
   <option value="La Salle Tarragona">La Salle Tarragona</option>
  <option value="La Salle Torreforta">La Salle Torreforta</option>
  </select>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="inputEmail" class="control-label col-xs-3"><?php echo ENTRY_EMAIL_ADDRESS; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('email_address', NULL, 'required aria-required="true" id="inputEmail" placeholder="' . ENTRY_EMAIL_ADDRESS . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_EMAIL_ADDRESS_TEXT)) echo '<span class="help-block">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>';
        ?>
      </div>
    </div>
  </div>
<?php
  //if (ACCOUNT_COMPANY == 'true') {
?>
<!--
  <h2><?php echo CATEGORY_COMPANY; ?></h2>
  
  <div class="contentText">
    <div class="form-group">
      <label for="inputCompany" class="control-label col-xs-3"><?php echo ENTRY_COMPANY; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('company', NULL, 'id="inputCompany" placeholder="' . ENTRY_COMPANY . '"');
        if (tep_not_null(ENTRY_COMPANY_TEXT)) echo '<span class="help-block">' . ENTRY_COMPANY_TEXT . '</span>';
        ?>
      </div>
    </div>
  </div-->

<?php
  //}
?>

  <!--h2><?php echo CATEGORY_ADDRESS; ?></h2>
  <div class="contentText">
    <div class="form-group has-feedback">
      <label for="inputStreet" class="control-label col-xs-3"><?php echo ENTRY_STREET_ADDRESS; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('street_address', NULL, 'required aria-required="true" id="inputStreet" placeholder="' . ENTRY_STREET_ADDRESS . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_STREET_ADDRESS_TEXT)) echo '<span class="help-block">' . ENTRY_STREET_ADDRESS_TEXT . '</span>';
        ?>
      </div>
    </div>


    <div class="form-group has-feedback">
      <label for="inputCity" class="control-label col-xs-3"><?php echo ENTRY_CITY; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('city', NULL, 'required aria-required="true" id="inputCity" placeholder="' . ENTRY_CITY. '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_CITY_TEXT)) echo '<span class="help-block">' . ENTRY_CITY_TEXT . '</span>';
        ?>
      </div>
    </div>
    <div class="form-group has-feedback">
      <label for="inputZip" class="control-label col-xs-3"><?php echo ENTRY_POST_CODE; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('postcode', NULL, 'required aria-required="true" id="inputZip" placeholder="' . ENTRY_POST_CODE . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_POST_CODE_TEXT)) echo '<span class="help-block">' . ENTRY_POST_CODE_TEXT . '</span>';
        ?>
     </div>
    </div>
<?php
  if (ACCOUNT_STATE == 'true') {
?>
/*****************INTRODUIRE LE NOM DE L'ECOLE QUI FAIT LA COMMANDE DES PRODUITS METTRE LES CONTACTS EN FIN DE LA PAGE ********************************************+++*/
    <div class="form-group has-feedback">
      <label for="inputState" class="control-label col-xs-3"><?php echo ENTRY_STATE; ?></label>
      <div class="col-xs-9">
        <?php
        if ($process == true) {
          if ($entry_state_has_zones == true) {
            $zones_array = array();
            $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' order by zone_name");
            while ($zones_values = tep_db_fetch_array($zones_query)) {
              $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
            }
            echo tep_draw_pull_down_menu('state', $zones_array, 0, 'id="inputState"');
            echo FORM_REQUIRED_INPUT;
          } else {
            echo tep_draw_input_field('state', NULL, 'id="inputState" placeholder="' . ENTRY_STATE . '"');
            echo FORM_REQUIRED_INPUT;
          }
        } else {
          echo tep_draw_input_field('state', NULL, 'id="inputState" placeholder="' . ENTRY_STATE    . '"');
          echo FORM_REQUIRED_INPUT;
        }
        if (tep_not_null(ENTRY_STATE_TEXT)) echo '<span class="help-block">' . ENTRY_STATE_TEXT . '</span>';
        ?>
      </div>
    </div>
<?php
  }
?>
    <div class="form-group has-feedback">
      <label for="inputCountry" class="control-label col-xs-3"><?php echo ENTRY_COUNTRY; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_get_country_list('country', NULL, 'required aria-required="true" id="inputCountry"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_COUNTRY_TEXT)) echo '<span class="help-block">' . ENTRY_COUNTRY_TEXT . '</span>';
        ?>
      </div>
    </div>
  </div-->

  <!--<h2><?php echo CATEGORY_CONTACT; ?></h2>-->
  
  <div class="contentText">
    <div class="form-group has-feedback">
      <label for="inputTelephone" class="control-label col-xs-3"><?php echo ENTRY_TELEPHONE_NUMBER; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('telephone', NULL, 'required aria-required="true" id="inputTelephone" placeholder="' . ENTRY_TELEPHONE_NUMBER . '"');
        echo FORM_REQUIRED_INPUT;
        if (tep_not_null(ENTRY_TELEPHONE_NUMBER_TEXT)) echo '<span class="help-block">' . ENTRY_TELEPHONE_NUMBER_TEXT . '</span>';
        ?>
      </div>
    </div>
    <!--div class="form-group">
      <label for="inputFax" class="control-label col-xs-3"><?php echo ENTRY_FAX_NUMBER; ?></label>
      <div class="col-xs-9">
        <?php
        echo tep_draw_input_field('fax', '', 'id="inputFax" placeholder="' . ENTRY_FAX_NUMBER . '"');
        if (tep_not_null(ENTRY_FAX_NUMBER_TEXT)) echo '<span class="help-block">' . ENTRY_FAX_NUMBER_TEXT . '</span>';
        ?>
      </div>
    </div-->
	 <div class="buttonSet col-xs-12">
	 <div class=>
	 <div class="text-left col-xs-6"><?php echo tep_draw_button(IMAGE_BUTTON_BACK, 'glyphicon glyphicon-user', FILENAME_DEFAULT, 'primary', null, 'btn-success'); ?></div>
     <div class="text-right col-xs-6"><?php echo tep_draw_button(IMAGE_BUTTON_EMAIL, 'glyphicon glyphicon-user', null, 'primary', null, 'btn-success'); ?></div>
  </div>

</div>

</form>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
