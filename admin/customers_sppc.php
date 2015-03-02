<?php
/*
  $Id: customers.php 1739 2008-07-19 00:52:16Z hpdl $
  adapted for Separate Pricing Per Customer v4.2.1 2008/03/09 (exempt specific tax rates added in v4.2.0, order total modules allowed in v4.2.1)
  customer_sort_admin_v1 http://www.oscommerce.com/community/contributions,223 added (modified)
  Account create in admin http://www.oscommerce.com/community/contributions,1644 added 2008/07/19

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  
  //#CHAVEIRO6# Step order/customer begin
////
// This function makes a new password from a plaintext password. 
  function tep_encrypt_password($plain) {
    $password = '';

    for ($i=0; $i<10; $i++) {
      $password .= tep_rand();
    }

    $salt = substr(md5($password), 0, 2);

    $password = md5($salt . $plain) . ':' . $salt;

    return $password;
  }
//#CHAVEIRO6# Step order/customer end

  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');

  $error = false;
  $processed = false;

  if (tep_not_null($action)) {
    switch ($action) {
      case 'update':
      // //#CHAVEIRO6# Step order/customer begin
      case 'insert':
      //#CHAVEIRO6# Step order/customer end
        $customers_id = tep_db_prepare_input($HTTP_GET_VARS['cID']);
        $customers_firstname = tep_db_prepare_input($HTTP_POST_VARS['customers_firstname']);
        $customers_lastname = tep_db_prepare_input($HTTP_POST_VARS['customers_lastname']);
        $customers_email_address = tep_db_prepare_input($HTTP_POST_VARS['customers_email_address']);
        $customers_telephone = tep_db_prepare_input($HTTP_POST_VARS['customers_telephone']);
        $customers_fax = tep_db_prepare_input($HTTP_POST_VARS['customers_fax']);
        $customers_newsletter = tep_db_prepare_input($HTTP_POST_VARS['customers_newsletter']);
// BOF Separate Pricing Per Customer
	$customers_group_id = tep_db_prepare_input($_POST['customers_group_id']);
	$customers_group_ra = tep_db_prepare_input($_POST['customers_group_ra']);
	$entry_company_tax_id = tep_db_prepare_input($_POST['entry_company_tax_id']);
	if ($_POST['customers_payment_allowed'] && $_POST['customers_payment_settings'] == '1') {
	$customers_payment_allowed = tep_db_prepare_input($_POST['customers_payment_allowed']);
	} else { // no error with subsequent re-posting of variables
	$customers_payment_allowed = '';
	if ($_POST['payment_allowed'] && $_POST['customers_payment_settings'] == '1') {
		foreach ($_POST['payment_allowed'] as $val) {
		    if ($val == true) {
		    $customers_payment_allowed .= tep_db_prepare_input($val).';';
		    }
		 } // end while
		  $customers_payment_allowed = substr($customers_payment_allowed,0,strlen($customers_payment_allowed)-1);
	} // end if ($_POST['payment_allowed'])
	} // end else ($_POST['customers_payment_allowed']
	if ($_POST['customers_shipment_allowed'] && $_POST['customers_shipment_settings'] == '1') {
	$customers_shipment_allowed = tep_db_prepare_input($_POST['customers_shipment_allowed']);
	} else { // no error with subsequent re-posting of variables

		$customers_shipment_allowed = '';
		if ($_POST['shipping_allowed'] && $_POST['customers_shipment_settings'] == '1') {
		  foreach ($_POST['shipping_allowed'] as $val) {
		    if ($val == true) {
		    $customers_shipment_allowed .= tep_db_prepare_input($val).';';
		    }
		  } // end while
		  $customers_shipment_allowed = substr($customers_shipment_allowed,0,strlen($customers_shipment_allowed)-1);
		} // end if ($_POST['shipment_allowed'])
	} // end else ($_POST['customers_shipment_allowed']
	if ($_POST['customers_order_total_allowed'] && $_POST['customers_order_total_settings'] == '1') {
	$customers_order_total_allowed = tep_db_prepare_input($_POST['customers_order_total_allowed']);
	} else { // no error with subsequent re-posting of variables

		$customers_order_total_allowed = '';
		if ($_POST['order_total_allowed'] && $_POST['customers_order_total_settings'] == '1') {
		  foreach ($_POST['order_total_allowed'] as $val) {
		    if ($val == true) {
		    $customers_order_total_allowed .= tep_db_prepare_input($val).';';
		    }
		  } // end while
		  $customers_order_total_allowed = substr($customers_order_total_allowed,0,strlen($customers_order_total_allowed)-1);
		} // end if ($_POST['order_total_allowed'])
	} // end else ($_POST['customers_order_total_allowed']
	if ($_POST['customers_specific_taxes_exempt'] && $_POST['customers_tax_rate_exempt_settings'] == '1') {
	$customers_specific_taxes_exempt = tep_db_prepare_input($_POST['customers_specific_taxes_exempt']);
	} else { // no error with subsequent re-posting of variables	

		$customers_specific_taxes_exempt = '';
		if ($_POST['customers_tax_rate_exempt_id'] && $_POST['customers_tax_rate_exempt_settings'] == '1') {
		  foreach($_POST['customers_tax_rate_exempt_id'] as $val) {
		    if (tep_not_null($val)) { 
		    $customers_specific_taxes_exempt .= tep_db_prepare_input($val).','; 
		    }
		  } // end while
		  $customers_specific_taxes_exempt = substr($customers_specific_taxes_exempt,0,strlen($customers_specific_taxes_exempt)-1);
		} // end if ($_POST['customers_tax_rate_exempt_id'])
	} // end else ($_POST['customers_specific_taxes_exempt']
// EOF Separate Pricing Per Customer
        $customers_gender = tep_db_prepare_input($HTTP_POST_VARS['customers_gender']);
        $customers_dob = tep_db_prepare_input($HTTP_POST_VARS['customers_dob']);

        $default_address_id = tep_db_prepare_input($HTTP_POST_VARS['default_address_id']);
        $entry_street_address = tep_db_prepare_input($HTTP_POST_VARS['entry_street_address']);
        $entry_suburb = tep_db_prepare_input($HTTP_POST_VARS['entry_suburb']);
        $entry_postcode = tep_db_prepare_input($HTTP_POST_VARS['entry_postcode']);
        $entry_city = tep_db_prepare_input($HTTP_POST_VARS['entry_city']);
        $entry_country_id = tep_db_prepare_input($HTTP_POST_VARS['entry_country_id']);

        $entry_company = tep_db_prepare_input($HTTP_POST_VARS['entry_company']);
        $entry_state = tep_db_prepare_input($HTTP_POST_VARS['entry_state']);
        if (isset($HTTP_POST_VARS['entry_zone_id'])) $entry_zone_id = tep_db_prepare_input($HTTP_POST_VARS['entry_zone_id']);

        if (strlen($customers_firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
          $error = true;
          $entry_firstname_error = true;
        } else {
          $entry_firstname_error = false;
        }

        if (strlen($customers_lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
          $error = true;
          $entry_lastname_error = true;
        } else {
          $entry_lastname_error = false;
        }

        if (ACCOUNT_DOB == 'true') {
          if (checkdate(substr(tep_date_raw($customers_dob), 4, 2), substr(tep_date_raw($customers_dob), 6, 2), substr(tep_date_raw($customers_dob), 0, 4))) {
            $entry_date_of_birth_error = false;
          } else {
            $error = true;
            $entry_date_of_birth_error = true;
          }
        }

        if (strlen($customers_email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
          $error = true;
          $entry_email_address_error = true;
        } else {
          $entry_email_address_error = false;
        }

        if (!tep_validate_email($customers_email_address)) {
          $error = true;
          $entry_email_address_check_error = true;
        } else {
          $entry_email_address_check_error = false;
        }

        if (strlen($entry_street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
          $error = true;
          $entry_street_address_error = true;
        } else {
          $entry_street_address_error = false;
        }

        if (strlen($entry_postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
          $error = true;
          $entry_post_code_error = true;
        } else {
          $entry_post_code_error = false;
        }

        if (strlen($entry_city) < ENTRY_CITY_MIN_LENGTH) {
          $error = true;
          $entry_city_error = true;
        } else {
          $entry_city_error = false;
        }

        if ($entry_country_id == false) {
          $error = true;
          $entry_country_error = true;
        } else {
          $entry_country_error = false;
        }

        if (ACCOUNT_STATE == 'true') {
          if ($entry_country_error == true) {
            $entry_state_error = true;
          } else {
            $zone_id = 0;
            $entry_state_error = false;
            $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . (int)$entry_country_id . "'");
            $check_value = tep_db_fetch_array($check_query);
            $entry_state_has_zones = ($check_value['total'] > 0);
            if ($entry_state_has_zones == true) {
              $zone_query = tep_db_query("select zone_id from " . TABLE_ZONES . " where zone_country_id = '" . (int)$entry_country_id . "' and zone_name = '" . tep_db_input($entry_state) . "'");
              if (tep_db_num_rows($zone_query) == 1) {
                $zone_values = tep_db_fetch_array($zone_query);
                $entry_zone_id = $zone_values['zone_id'];
              } else {
                $error = true;
                $entry_state_error = true;
              }
            } else {
              if (strlen($entry_state) < ENTRY_STATE_MIN_LENGTH) {
                $error = true;
                $entry_state_error = true;
              }
            }
         }
      }

      if (strlen($customers_telephone) < ENTRY_TELEPHONE_MIN_LENGTH) {
        $error = true;
        $entry_telephone_error = true;
      } else {
        $entry_telephone_error = false;
      }

      $check_email = tep_db_query("select customers_email_address from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($customers_email_address) . "' and customers_id != '" . (int)$customers_id . "'");
      if (tep_db_num_rows($check_email)) {
        $error = true;
        $entry_email_address_exists = true;
      } else {
        $entry_email_address_exists = false;
      }

      if ($error == false) {

        $sql_data_array = array('customers_firstname' => $customers_firstname,
                                'customers_lastname' => $customers_lastname,
                                'customers_email_address' => $customers_email_address,
                                'customers_telephone' => $customers_telephone,
                                'customers_fax' => $customers_fax,
                                'customers_newsletter' => $customers_newsletter,
// BOF Separate Pricing Per Customer
        'customers_group_id' => $customers_group_id,
        'customers_group_ra' => $customers_group_ra,
        'customers_payment_allowed' => $customers_payment_allowed,
        'customers_shipment_allowed' => $customers_shipment_allowed,
        'customers_order_total_allowed' => $customers_order_total_allowed,
        'customers_specific_taxes_exempt' => $customers_specific_taxes_exempt,
        'entry_company_tax_id' => $entry_company_tax_id);
// EOF Separate Pricing Per Customer

        if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $customers_gender;
        if (ACCOUNT_DOB == 'true') $sql_data_array['customers_dob'] = tep_date_raw($customers_dob);
//#CHAVEIRO6# Step order/customer begin
			if ($action == 'insert') {
				//      RAMDOMIZING SCRIPT BY PATRIC VEVERKA
				$t1 = date("mdy"); 
				srand ((float) microtime() * 10000000); 
//				$input = array ("A", "a", "B", "b", "C", "c", "D", "d", "E", "e", "F", "f", "G", "g", "H", "h", "I", "i", "J", "j", "K", "k", "L", "l", "M", "m", "N", "n", "O", "o", "P", "p", "Q", "q", "R", "r", "S", "s", "T", "t", "U", "u", "V", "v", "W", "w", "X", "x", "Y", "y", "Z", "z"); 
				$input = array ("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"); 
				$rand_keys = array_rand ($input, 3); 
				$l1 = $input[$rand_keys[0]];
				$r1 = rand(0,9); 
				$l2 = $input[$rand_keys[1]];
				$l3 = $input[$rand_keys[2]]; 
				$r2 = rand(0,9); 
				$password = "gt".$l1.$r1.$l2.$l3.$r2; 
				//    End of Randomizing Script
				$sql_data_array['customers_password'] = tep_encrypt_password($password);

				tep_db_perform(TABLE_CUSTOMERS, $sql_data_array);

				$customer_id = tep_db_insert_id();

				$sql_data_array = array('customers_id' => $customer_id,
                              'entry_firstname' => $customers_firstname,
                              'entry_lastname' => $customers_lastname,
                              'entry_street_address' => $entry_street_address,
                              'entry_postcode' => $entry_postcode,
                              'entry_city' => $entry_city,
							  'entry_gender' => $customers_gender,
                              'entry_country_id' => $entry_country_id);
			}
			else {
//#CHAVEIRO6# Step order/customer end
        tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . (int)$customers_id . "'");

        tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_account_last_modified = now() where customers_info_id = '" . (int)$customers_id . "'");

        if ($entry_zone_id > 0) $entry_state = '';

        $sql_data_array = array('entry_firstname' => $customers_firstname,
                                'entry_lastname' => $customers_lastname,
                                'entry_street_address' => $entry_street_address,
                                'entry_postcode' => $entry_postcode,
                                'entry_city' => $entry_city,
                                'entry_country_id' => $entry_country_id);
//#CHAVEIRO6# Step order/customer begin
			}
//#CHAVEIRO6# Step order/customer end
        if (ACCOUNT_COMPANY == 'true') $sql_data_array['entry_company'] = $entry_company;
        if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $entry_suburb;

        if (ACCOUNT_STATE == 'true') {
          if ($entry_zone_id > 0) {
            $sql_data_array['entry_zone_id'] = $entry_zone_id;
            $sql_data_array['entry_state'] = '';
          } else {
            $sql_data_array['entry_zone_id'] = '0';
            $sql_data_array['entry_state'] = $entry_state;
          }
        }

//#CHAVEIRO6# Step order/customer begin
			if ($action == 'insert') {
			     tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);
			    $address_id = tep_db_insert_id();
			    tep_db_query("update " . TABLE_CUSTOMERS . " set customers_default_address_id = '" . (int)$address_id . "' where customers_id = '" . (int)$customer_id . "'");
			    tep_db_query("insert into " . TABLE_CUSTOMERS_INFO . " (customers_info_id, customers_info_number_of_logons, customers_info_date_account_created) values ('" . (int)$customer_id . "', '0', now())");

				// build the message content
				$name = $customers_firstname . " " . $customers_lastname;
				if (ACCOUNT_GENDER == 'true') {
					 if ($HTTP_POST_VARS['customers_gender'] == 'm') {
					   $email_text = sprintf(EMAIL_GREET_MR, $customers_lastname);
					 } else {
					   $email_text = sprintf(EMAIL_GREET_MS, $customers_lastname);
					 }
				} else {
					$email_text = sprintf(EMAIL_GREET_NONE, $customers_firstname);
				}
				
				$email_text .= EMAIL_WELCOME . sprintf(EMAIL_PASS, $password) . EMAIL_TEXT . EMAIL_CONTACT . EMAIL_WARNING;
				tep_mail($name, $customers_email_address, EMAIL_SUBJECT, nl2br($email_text), STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
		
			  tep_redirect(tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $customer_id));			
			}
			else {
//#CHAVEIRO6# Step order/customer end

        tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array, 'update', "customers_id = '" . (int)$customers_id . "' and address_book_id = '" . (int)$default_address_id . "'");

        tep_redirect(tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $customers_id));
//#CHAVEIRO6# Step order/customer begin
			}
//#CHAVEIRO6# Step order/customer end
        } else if ($error == true) {
          $cInfo = new objectInfo($HTTP_POST_VARS);
          $processed = true;
        }

        break;
      case 'deleteconfirm':
        $customers_id = tep_db_prepare_input($HTTP_GET_VARS['cID']);

        if (isset($HTTP_POST_VARS['delete_reviews']) && ($HTTP_POST_VARS['delete_reviews'] == 'on')) {
          $reviews_query = tep_db_query("select reviews_id from " . TABLE_REVIEWS . " where customers_id = '" . (int)$customers_id . "'");
          while ($reviews = tep_db_fetch_array($reviews_query)) {
            tep_db_query("delete from " . TABLE_REVIEWS_DESCRIPTION . " where reviews_id = '" . (int)$reviews['reviews_id'] . "'");
          }

          tep_db_query("delete from " . TABLE_REVIEWS . " where customers_id = '" . (int)$customers_id . "'");
        } else {
          tep_db_query("update " . TABLE_REVIEWS . " set customers_id = null where customers_id = '" . (int)$customers_id . "'");
        }

        tep_db_query("delete from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customers_id . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customers_id . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (int)$customers_id . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . (int)$customers_id . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " where customers_id = '" . (int)$customers_id . "'");
        tep_db_query("delete from " . TABLE_WHOS_ONLINE . " where customer_id = '" . (int)$customers_id . "'");

        tep_redirect(tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action'))));
        break;

//#CHAVEIRO6# Step order/customer begin
      case 'new':
		  $customers_newsletter = 1;
		  $entry_country_id = STORE_COUNTRY;
	// BOF added for customer add/SPPC combination
        $module_directory = DIR_FS_CATALOG_MODULES . 'payment/';
        $ship_module_directory = DIR_FS_CATALOG_MODULES . 'shipping/';
        $order_total_module_directory = DIR_FS_CATALOG_MODULES . 'order_total/';

        $file_extension = substr($PHP_SELF, strrpos($PHP_SELF, '.'));
        $directory_array = array();
        if ($dir = @dir($module_directory)) {
        while ($file = $dir->read()) {
        if (!is_dir($module_directory . $file)) {
           if (substr($file, strrpos($file, '.')) == $file_extension) {
              $directory_array[] = $file; // array of all the payment modules present in includes/modules/payment
                  }
               }
            }
        sort($directory_array);
        $dir->close();
        }

        $ship_directory_array = array();
        if ($dir = @dir($ship_module_directory)) {
        while ($file = $dir->read()) {
        if (!is_dir($ship_module_directory . $file)) {
           if (substr($file, strrpos($file, '.')) == $file_extension) {
              $ship_directory_array[] = $file; // array of all shipping modules present in includes/modules/shipping
                }
              }
            }
            sort($ship_directory_array);
            $dir->close();
        }

   $order_total_directory_array = array();
   if ($dir = @dir($order_total_module_directory)) {
    while ($file = $dir->read()) {
      if (!is_dir($order_total_module_directory . $file)) {
        if (substr($file, strrpos($file, '.')) == $file_extension) {
          $order_total_directory_array[] = $file; // array of all order total modules present in includes/modules/order_total
        }
      }
    }
    sort($order_total_directory_array);
    $dir->close();
  }
// EOF added for customer add/SPPC combination
//#CHAVEIRO6# Step order/customer end

      default:
//#CHAVEIRO6# Step order/customer begin
	  if ($action != 'new') {
//#CHAVEIRO6# Step order/customer end
// BOF Separate Pricing Per Customer
        $customers_query = tep_db_query("select c.customers_id, c.customers_gender, c.customers_firstname, c.customers_lastname, c.customers_dob, c.customers_email_address, a.entry_company, c.entry_company_tax_id, a.entry_street_address, a.entry_suburb, a.entry_postcode, a.entry_city, a.entry_state, a.entry_zone_id, a.entry_country_id, c.customers_telephone, c.customers_fax, c.customers_newsletter, c.customers_group_id,  c.customers_group_ra, c.customers_payment_allowed, c.customers_shipment_allowed, c.customers_order_total_allowed, c.customers_specific_taxes_exempt, c.customers_default_address_id from " . TABLE_CUSTOMERS . " c left join " . TABLE_ADDRESS_BOOK . " a on c.customers_default_address_id = a.address_book_id where a.customers_id = c.customers_id and c.customers_id = '" . (int)$HTTP_GET_VARS['cID'] . "'");

        $module_directory = DIR_FS_CATALOG_MODULES . 'payment/';
        $ship_module_directory = DIR_FS_CATALOG_MODULES . 'shipping/';
        $order_total_module_directory = DIR_FS_CATALOG_MODULES . 'order_total/';

        $file_extension = substr($PHP_SELF, strrpos($PHP_SELF, '.'));
        $directory_array = array();
        if ($dir = @dir($module_directory)) {
        while ($file = $dir->read()) {
        if (!is_dir($module_directory . $file)) {
           if (substr($file, strrpos($file, '.')) == $file_extension) {
              $directory_array[] = $file; // array of all the payment modules present in includes/modules/payment
                  }
               }
            }
        sort($directory_array);
        $dir->close();
        }

        $ship_directory_array = array();
        if ($dir = @dir($ship_module_directory)) {
        while ($file = $dir->read()) {
        if (!is_dir($ship_module_directory . $file)) {
           if (substr($file, strrpos($file, '.')) == $file_extension) {
              $ship_directory_array[] = $file; // array of all shipping modules present in includes/modules/shipping
                }
              }
            }
            sort($ship_directory_array);
            $dir->close();
        }

   $order_total_directory_array = array();
   if ($dir = @dir($order_total_module_directory)) {
    while ($file = $dir->read()) {
      if (!is_dir($order_total_module_directory . $file)) {
        if (substr($file, strrpos($file, '.')) == $file_extension) {
          $order_total_directory_array[] = $file; // array of all order total modules present in includes/modules/order_total
        }
      }
    }
    sort($order_total_directory_array);
    $dir->close();
  }
// EOF Separate Pricing Per Customer
        $customers = tep_db_fetch_array($customers_query);
        $cInfo = new objectInfo($customers);
//#CHAVEIRO6# Step order/customer begin
	  }
//#CHAVEIRO6# Step order/customer end
    } // end switch ($action)
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/general.js"></script>
<?php
  if ($action == 'edit' || $action == 'update' 
//#CHAVEIRO6# Step order/customer begin
  || $action == 'new' || $action == 'insert'
//#CHAVEIRO6# Step order/customer end
) {
?>
<script language="javascript"><!--

function check_form() {
  var error = 0;
  var error_message = "<?php echo JS_ERROR; ?>";

  var customers_firstname = document.customers.customers_firstname.value;
  var customers_lastname = document.customers.customers_lastname.value;
<?php if (ACCOUNT_COMPANY == 'true') echo 'var entry_company = document.customers.entry_company.value;' . "\n"; ?>
<?php if (ACCOUNT_DOB == 'true') echo 'var customers_dob = document.customers.customers_dob.value;' . "\n"; ?>
  var customers_email_address = document.customers.customers_email_address.value;
  var entry_street_address = document.customers.entry_street_address.value;
  var entry_postcode = document.customers.entry_postcode.value;
  var entry_city = document.customers.entry_city.value;
  var customers_telephone = document.customers.customers_telephone.value;

<?php if (ACCOUNT_GENDER == 'true') { ?>
  if (document.customers.customers_gender[0].checked || document.customers.customers_gender[1].checked) {
  } else {
    error_message = error_message + "<?php echo JS_GENDER; ?>";
    error = 1;
  }
<?php } ?>

  if (customers_firstname.length < <?php echo ENTRY_FIRST_NAME_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_FIRST_NAME; ?>";
    error = 1;
  }

  if (customers_lastname.length < <?php echo ENTRY_LAST_NAME_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_LAST_NAME; ?>";
    error = 1;
  }

<?php if (ACCOUNT_DOB == 'true') { ?>
  if (customers_dob.length < <?php echo ENTRY_DOB_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_DOB; ?>";
    error = 1;
  }
<?php } ?>

  if (customers_email_address.length < <?php echo ENTRY_EMAIL_ADDRESS_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_EMAIL_ADDRESS; ?>";
    error = 1;
  }

  if (entry_street_address.length < <?php echo ENTRY_STREET_ADDRESS_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_ADDRESS; ?>";
    error = 1;
  }

  if (entry_postcode.length < <?php echo ENTRY_POSTCODE_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_POST_CODE; ?>";
    error = 1;
  }

  if (entry_city.length < <?php echo ENTRY_CITY_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_CITY; ?>";
    error = 1;
  }

<?php
  if (ACCOUNT_STATE == 'true') {
?>
  if (document.customers.elements['entry_state'].type != "hidden") {
    if (document.customers.entry_state.value.length < <?php echo ENTRY_STATE_MIN_LENGTH; ?>) {
       error_message = error_message + "<?php echo JS_STATE; ?>";
       error = 1;
    }
  }
<?php
  }
?>

  if (document.customers.elements['entry_country_id'].type != "hidden") {
    if (document.customers.entry_country_id.value == 0) {
      error_message = error_message + "<?php echo JS_COUNTRY; ?>";
      error = 1;
    }
  }

  if (customers_telephone.length < <?php echo ENTRY_TELEPHONE_MIN_LENGTH; ?>) {
    error_message = error_message + "<?php echo JS_TELEPHONE; ?>";
    error = 1;
  }

  if (error == 1) {
    alert(error_message);
    return false;
  } else {
    return true;
  }
}
//--></script>
<?php
  }
?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if ($action == 'edit' || $action == 'update'
//#CHAVEIRO6# Step order/customer begin
  || $action == 'new' || $action == 'insert'
//#CHAVEIRO6# Step order/customer end
  ) {
    $newsletter_array = array(array('id' => '1', 'text' => ENTRY_NEWSLETTER_YES),
                              array('id' => '0', 'text' => ENTRY_NEWSLETTER_NO));
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php
//#CHAVEIRO6# Step order/customer begin
			 if ($action == 'new' || $action == 'insert') {
				 echo HEADING_TITLE_ADD; } 
			 else {
//#CHAVEIRO6# Step order/customer end	
				echo HEADING_TITLE;
//#CHAVEIRO6# Step order/customer begin
			}
//#CHAVEIRO6# Step order/customer end
?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('customers', FILENAME_CUSTOMERS, tep_get_all_get_params(array('action')) . 
//#CHAVEIRO6# Step order/customer begin
(($action == 'new' || $action == 'insert') ? 'action=insert' : 'action=update')
//#CHAVEIRO6# Step order/customer end
, 'post', 'onSubmit="return check_form();"') . tep_draw_hidden_field('default_address_id', $cInfo->customers_default_address_id); ?>
        <td class="formAreaTitle"><?php echo CATEGORY_PERSONAL; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
<?php
    if (ACCOUNT_GENDER == 'true') {
?>
          <tr>
            <td class="main"><?php echo ENTRY_GENDER; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_gender_error == true) {
        echo tep_draw_radio_field('customers_gender', 'm', false, $cInfo->customers_gender) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_gender', 'f', false, $cInfo->customers_gender) . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . ENTRY_GENDER_ERROR;
      } else {
        echo ($cInfo->customers_gender == 'm') ? tep_draw_radio_field('customers_gender', 'm', true, $cInfo->customers_gender) . '&nbsp;&nbsp;' . MALE :  tep_draw_radio_field('customers_gender', 'f', true, $cInfo->customers_gender) . '&nbsp;&nbsp;' . FEMALE;
        echo tep_draw_hidden_field('customers_gender');
      }
    } else {
      echo tep_draw_radio_field('customers_gender', 'm', false, $cInfo->customers_gender) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_gender', 'f', false, $cInfo->customers_gender) . '&nbsp;&nbsp;' . FEMALE;
    }
?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td class="main"><?php echo ENTRY_FIRST_NAME; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_firstname_error == true) {
      echo tep_draw_input_field('customers_firstname', $cInfo->customers_firstname, 'maxlength="32"') . '&nbsp;' . ENTRY_FIRST_NAME_ERROR;
    } else {
      echo $cInfo->customers_firstname . tep_draw_hidden_field('customers_firstname');
    }
  } else {
    echo tep_draw_input_field('customers_firstname', $cInfo->customers_firstname, 'maxlength="32"', true);
  }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_LAST_NAME; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_lastname_error == true) {
      echo tep_draw_input_field('customers_lastname', $cInfo->customers_lastname, 'maxlength="32"') . '&nbsp;' . ENTRY_LAST_NAME_ERROR;
    } else {
      echo $cInfo->customers_lastname . tep_draw_hidden_field('customers_lastname');
    }
  } else {
    echo tep_draw_input_field('customers_lastname', $cInfo->customers_lastname, 'maxlength="32"', true);
  }
?></td>
          </tr>
<?php
    if (ACCOUNT_DOB == 'true') {
?>
          <tr>
            <td class="main"><?php echo ENTRY_DATE_OF_BIRTH; ?></td>
            <td class="main">

<?php
    if ($error == true) {
      if ($entry_date_of_birth_error == true) {
        echo tep_draw_input_field('customers_dob', tep_date_short($cInfo->customers_dob), 'maxlength="10"') . '&nbsp;' . ENTRY_DATE_OF_BIRTH_ERROR;
      } else {
        echo $cInfo->customers_dob . tep_draw_hidden_field('customers_dob');
      }
    } else {
      echo tep_draw_input_field('customers_dob', tep_date_short($cInfo->customers_dob), 'maxlength="10"', true) . '&nbsp;' . ENTRY_DATE_OF_BIRTH_ERROR;
    }
?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td class="main"><?php echo ENTRY_EMAIL_ADDRESS; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_email_address_error == true) {
      echo tep_draw_input_field('customers_email_address', $cInfo->customers_email_address, 'maxlength="96"') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_ERROR;
    } elseif ($entry_email_address_check_error == true) {
      echo tep_draw_input_field('customers_email_address', $cInfo->customers_email_address, 'maxlength="96"') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_CHECK_ERROR;
    } elseif ($entry_email_address_exists == true) {
      echo tep_draw_input_field('customers_email_address', $cInfo->customers_email_address, 'maxlength="96"') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_ERROR_EXISTS;
    } else {
      echo $customers_email_address . tep_draw_hidden_field('customers_email_address');
    }
  } else {
    echo tep_draw_input_field('customers_email_address', $cInfo->customers_email_address, 'maxlength="96"', true);
  }
?></td>
          </tr>
        </table></td>
      </tr>
<?php
    if (ACCOUNT_COMPANY == 'true') {
?>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_COMPANY; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_COMPANY; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_company_error == true) {
        echo tep_draw_input_field('entry_company', $cInfo->entry_company, 'maxlength="32"') . '&nbsp;' . ENTRY_COMPANY_ERROR;
      } else {
        echo $cInfo->entry_company . tep_draw_hidden_field('entry_company');
      }
} else {
      echo tep_draw_input_field('entry_company', $cInfo->entry_company, 'maxlength="32"');
    }
?></td>
          </tr>
<!-- BOF Separate Pricing Per Customer -->
          <tr>
            <td class="main"><?php echo ENTRY_COMPANY_TAX_ID; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_company_tax_id_error == true) {
        echo tep_draw_input_field('entry_company_tax_id', $cInfo->entry_company_tax_id, 'maxlength="32"') . '&nbsp;' . ENTRY_COMPANY_TAX_ID_ERROR;
      } else {
        echo $cInfo->entry_company . tep_draw_hidden_field('entry_company_tax_id');
      }
    } else {
      echo tep_draw_input_field('entry_company_tax_id', $cInfo->entry_company_tax_id, 'maxlength="32"');
      }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CUSTOMERS_GROUP_REQUEST_AUTHENTICATION; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($customers_group_ra_error == true) {
        echo tep_draw_radio_field('customers_group_ra', '0', false, $cInfo->customers_group_ra) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_GROUP_RA_NO . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_group_ra', '1', false, $cInfo->customers_group_ra) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_GROUP_RA_YES . '&nbsp;' . ENTRY_CUSTOMERS_GROUP_RA_ERROR;
      } else {
        echo ($cInfo->customers_group_ra == '0') ? ENTRY_CUSTOMERS_GROUP_RA_NO : ENTRY_CUSTOMERS_GROUP_RA_YES;
        echo tep_draw_hidden_field('customers_group_ra');
      }
    } else {
      echo tep_draw_radio_field('customers_group_ra', '0', false, $cInfo->customers_group_ra) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_GROUP_RA_NO . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_group_ra', '1', false, $cInfo->customers_group_ra) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_GROUP_RA_YES;
    }
?></td>
          </tr>
<!-- EOF Separate Pricing Per Customer -->
        </table></td>
      </tr>
<?php
    }
?>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_ADDRESS; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_STREET_ADDRESS; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_street_address_error == true) {
      echo tep_draw_input_field('entry_street_address', $cInfo->entry_street_address, 'maxlength="64"') . '&nbsp;' . ENTRY_STREET_ADDRESS_ERROR;
    } else {
      echo $cInfo->entry_street_address . tep_draw_hidden_field('entry_street_address');
    }
  } else {
    echo tep_draw_input_field('entry_street_address', $cInfo->entry_street_address, 'maxlength="64"', true);
  }
?></td>
          </tr>
<?php
    if (ACCOUNT_SUBURB == 'true') {
?>
          <tr>
            <td class="main"><?php echo ENTRY_SUBURB; ?></td>
            <td class="main">
<?php
    if ($error == true) {
      if ($entry_suburb_error == true) {
        echo tep_draw_input_field('suburb', $cInfo->entry_suburb, 'maxlength="32"') . '&nbsp;' . ENTRY_SUBURB_ERROR;
      } else {
        echo $cInfo->entry_suburb . tep_draw_hidden_field('entry_suburb');
      }
    } else {
      echo tep_draw_input_field('entry_suburb', $cInfo->entry_suburb, 'maxlength="32"');
    }
?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td class="main"><?php echo ENTRY_POST_CODE; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_post_code_error == true) {
      echo tep_draw_input_field('entry_postcode', $cInfo->entry_postcode, 'maxlength="8"') . '&nbsp;' . ENTRY_POST_CODE_ERROR;
    } else {
      echo $cInfo->entry_postcode . tep_draw_hidden_field('entry_postcode');
    }
  } else {
    echo tep_draw_input_field('entry_postcode', $cInfo->entry_postcode, 'maxlength="8"', true);
  }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CITY; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_city_error == true) {
      echo tep_draw_input_field('entry_city', $cInfo->entry_city, 'maxlength="32"') . '&nbsp;' . ENTRY_CITY_ERROR;
    } else {
      echo $cInfo->entry_city . tep_draw_hidden_field('entry_city');
    }
  } else {
    echo tep_draw_input_field('entry_city', $cInfo->entry_city, 'maxlength="32"', true);
  }
?></td>
          </tr>
<?php
    if (ACCOUNT_STATE == 'true') {
?>
          <tr>
            <td class="main"><?php echo ENTRY_STATE; ?></td>
            <td class="main">
<?php
    $entry_state = tep_get_zone_name($cInfo->entry_country_id, $cInfo->entry_zone_id, $cInfo->entry_state);
    if ($error == true) {
      if ($entry_state_error == true) {
        if ($entry_state_has_zones == true) {
          $zones_array = array();
          $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($cInfo->entry_country_id) . "' order by zone_name");
          while ($zones_values = tep_db_fetch_array($zones_query)) {
            $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
          }
          echo tep_draw_pull_down_menu('entry_state', $zones_array) . '&nbsp;' . ENTRY_STATE_ERROR;
        } else {
          echo tep_draw_input_field('entry_state', tep_get_zone_name($cInfo->entry_country_id, $cInfo->entry_zone_id, $cInfo->entry_state)) . '&nbsp;' . ENTRY_STATE_ERROR;
        }
      } else {
        echo $entry_state . tep_draw_hidden_field('entry_zone_id') . tep_draw_hidden_field('entry_state');
      }
    } else {
      echo tep_draw_input_field('entry_state', tep_get_zone_name($cInfo->entry_country_id, $cInfo->entry_zone_id, $cInfo->entry_state),"",true);
    }

?></td>
         </tr>
<?php
    }
?>
          <tr>
            <td class="main"><?php echo ENTRY_COUNTRY; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_country_error == true) {
      echo tep_draw_pull_down_menu('entry_country_id', tep_get_countries(), $cInfo->entry_country_id) . '&nbsp;' . ENTRY_COUNTRY_ERROR;
    } else {
      echo tep_get_country_name($cInfo->entry_country_id) . tep_draw_hidden_field('entry_country_id');
    }
  } else {
    echo tep_draw_pull_down_menu('entry_country_id', tep_get_countries(), $cInfo->entry_country_id);
  }
?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_CONTACT; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_TELEPHONE_NUMBER; ?></td>
            <td class="main">
<?php
  if ($error == true) {
    if ($entry_telephone_error == true) {
      echo tep_draw_input_field('customers_telephone', $cInfo->customers_telephone, 'maxlength="32"') . '&nbsp;' . ENTRY_TELEPHONE_NUMBER_ERROR;
    } else {
      echo $cInfo->customers_telephone . tep_draw_hidden_field('customers_telephone');
    }
  } else {
    echo tep_draw_input_field('customers_telephone', $cInfo->customers_telephone, 'maxlength="32"', true);
  }
?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_FAX_NUMBER; ?></td>
            <td class="main">
<?php
  if ($processed == true) {
    echo $cInfo->customers_fax . tep_draw_hidden_field('customers_fax');
  } else {
    echo tep_draw_input_field('customers_fax', $cInfo->customers_fax, 'maxlength="32"');
  }
?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo CATEGORY_OPTIONS; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td class="main"><?php echo ENTRY_NEWSLETTER; ?></td>
            <td class="main">
<?php
  if ($processed == true) {
    if ($cInfo->customers_newsletter == '1') {
      echo ENTRY_NEWSLETTER_YES;
    } else {
      echo ENTRY_NEWSLETTER_NO;
    }
    echo tep_draw_hidden_field('customers_newsletter');
  } else {
    echo tep_draw_pull_down_menu('customers_newsletter', $newsletter_array, (($cInfo->customers_newsletter == '1') ? '1' : '0'));
  }
?></td>
          </tr>
<!--  BOF Separate Pricing per Customer -->
<tr>
  <td class="main"><?php echo ENTRY_CUSTOMERS_GROUP_NAME; ?></td>
  <?php
  if ($processed != true) {
  $index = 0;
 	$existing_customers_query = tep_db_query("select customers_group_id, customers_group_name from " . TABLE_CUSTOMERS_GROUPS . " order by customers_group_id ");
  while ($existing_customers =  tep_db_fetch_array($existing_customers_query)) {
  $existing_customers_array[] = array("id" => $existing_customers['customers_group_id'], "text" => "&#160;".$existing_customers['customers_group_name']."&#160;");
    ++$index;
  }
  } // end if ($processed != true )
?>
  <td class="main"><?php if ($processed == true) {
    echo $cInfo->customers_group_id . tep_draw_hidden_field('customers_group_id');
  } else {
  echo tep_draw_pull_down_menu('customers_group_id', $existing_customers_array, $cInfo->customers_group_id);
  } ?></td>
</tr>
<!-- EOF Separate Pricing per Customer -->
        </table></td>
      </tr>
<!-- BOF Separate Pricing per Customer -->
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php include_once(DIR_WS_LANGUAGES . $language . '/modules.php');
	echo HEADING_TITLE_MODULES_PAYMENT; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr bgcolor="#DEE4E8">
            <td class="main" colspan="2"><?php if ($processed == true) {
            if ($cInfo->customers_payment_settings == '1') {
		echo ENTRY_CUSTOMERS_PAYMENT_SET ;
		echo ' : ';
	    } else {
		echo ENTRY_CUSTOMERS_PAYMENT_DEFAULT;
	    }
	    echo tep_draw_hidden_field('customers_payment_settings');
            } else { // $processed != true
            echo tep_draw_radio_field('customers_payment_settings', '1', false, (tep_not_null($cInfo->customers_payment_allowed)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_PAYMENT_SET . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_payment_settings', '0', false, (tep_not_null($cInfo->customers_payment_allowed)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_PAYMENT_DEFAULT ; } ?></td>
	  </tr>
<?php if ($processed != true) {
    $payments_allowed = explode (";",$cInfo->customers_payment_allowed);
    $module_active = explode (";",MODULE_PAYMENT_INSTALLED);
    $installed_modules = array();
    for ($i = 0, $n = sizeof($directory_array); $i < $n; $i++) {
    $file = $directory_array[$i];
    if (in_array ($directory_array[$i], $module_active)) {
      include(DIR_FS_CATALOG_LANGUAGES . $language . '/modules/payment/' . $file);
      include($module_directory . $file);

     $class = substr($file, 0, strrpos($file, '.'));
     if (tep_class_exists($class)) {
       $module = new $class;
       if ($module->check() > 0) {
         $installed_modules[] = $file;
       }
     } // end if (tep_class_exists($class))
?>
          <tr>
            <td class="main" colspan="2"><?php echo tep_draw_checkbox_field('payment_allowed[' . $i . ']', $module->code.".php" , (in_array ($module->code.".php", $payments_allowed)) ?  1 : 0); ?>&#160;&#160;<?php echo $module->title; ?></td>
	  </tr>
<?php
  } // end if (in_array ($directory_array[$i], $module_active))
 } // end for ($i = 0, $n = sizeof($directory_array); $i < $n; $i++)
	?>
	   <tr>
            <td class="main" colspan="2" style="padding-left: 30px; padding-right: 10px; padding-top: 10px;"><?php echo ENTRY_CUSTOMERS_PAYMENT_SET_EXPLAIN ?></td>
           </tr>
<?php
   } else { // end if ($processed != true)
?>
	    <tr>
            <td class="main" colspan="2"><?php if ($cInfo->customers_payment_settings == '1') {
		echo $customers_payment_allowed;
	    } else {
		echo ENTRY_CUSTOMERS_PAYMENT_DEFAULT;
	    }
	    echo tep_draw_hidden_field('customers_payment_allowed', $customers_payment_allowed); ?></td>
	  </tr>
<?php
 } // end else: $processed == true
?>
	   </td>
	  </tr>
	 </table>
	</td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo HEADING_TITLE_MODULES_SHIPPING; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr bgcolor="#DEE4E8">
            <td class="main" colspan="2"><?php if ($processed == true) {
            if ($cInfo->customers_shipment_settings == '1') {
		echo ENTRY_CUSTOMERS_SHIPPING_SET ;
		echo ' : ';
	    } else {
		echo ENTRY_CUSTOMERS_SHIPPING_DEFAULT;
	    }
	    echo tep_draw_hidden_field('customers_shipment_settings');
            } else { // $processed != true
            echo tep_draw_radio_field('customers_shipment_settings', '1', false, (tep_not_null($cInfo->customers_shipment_allowed)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_SHIPPING_SET . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_shipment_settings', '0', false, (tep_not_null($cInfo->customers_shipment_allowed)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_SHIPPING_DEFAULT ; } ?></td>
	  </tr>
<?php if ($processed != true) {
    $shipment_allowed = explode (";",$cInfo->customers_shipment_allowed);
    $ship_module_active = explode (";",MODULE_SHIPPING_INSTALLED);
    $installed_shipping_modules = array();
    for ($i = 0, $n = sizeof($ship_directory_array); $i < $n; $i++) {
    $file = $ship_directory_array[$i];
    if (in_array ($ship_directory_array[$i], $ship_module_active)) {
      include(DIR_FS_CATALOG_LANGUAGES . $language . '/modules/shipping/' . $file);
      include($ship_module_directory . $file);

     $ship_class = substr($file, 0, strrpos($file, '.'));
     if (tep_class_exists($ship_class)) {
       $ship_module = new $ship_class;
       if ($ship_module->check() > 0) {
         $installed_shipping_modules[] = $file;
       }
     } // end if (tep_class_exists($ship_class))
?>
          <tr>
            <td class="main" colspan="2"><?php echo tep_draw_checkbox_field('shipping_allowed[' . $i . ']', $ship_module->code.".php" , (in_array ($ship_module->code.".php", $shipment_allowed)) ?  1 : 0); ?>&#160;&#160;<?php echo $ship_module->title; ?></td>
	  </tr>
<?php
  } // end if (in_array ($ship_directory_array[$i], $ship_module_active))
 } // end for ($i = 0, $n = sizeof($ship_directory_array); $i < $n; $i++)
	?>
	   <tr>
            <td class="main" colspan="2" style="padding-left: 30px; padding-right: 10px; padding-top: 10px;"><?php echo ENTRY_CUSTOMERS_SHIPPING_SET_EXPLAIN ?></td>
           </tr>
<?php
   } else { // end if ($processed != true)
?>
	    <tr>
            <td class="main" colspan="2"><?php if ($cInfo->customers_shipment_settings == '1') {
		echo $customers_shipment_allowed;
	    } else {
		echo ENTRY_CUSTOMERS_SHIPPING_DEFAULT;
	    }
	    echo tep_draw_hidden_field('customers_shipment_allowed', $customers_shipment_allowed); ?></td>
	  </tr>
<?php
 } // end else: $processed == true
?>
	   </td>
	  </tr>
	 </table>
	</td>
      </tr>
<!-- order total allowed -->
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo HEADING_TITLE_MODULES_ORDER_TOTAL; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr bgcolor="#DEE4E8">
            <td class="main" colspan="2"><?php if ($processed == true) {
            if ($cInfo->customers_order_total_settings == '1') {
		echo ENTRY_CUSTOMERS_ORDER_TOTAL_SET ;
		echo ' : ';
	    } else {
		echo ENTRY_CUSTOMERS_ORDER_TOTAL_DEFAULT;
	    }
	    echo tep_draw_hidden_field('customers_order_total_settings');
            } else { // $processed != true
            echo tep_draw_radio_field('customers_order_total_settings', '1', false, (tep_not_null($cInfo->customers_order_total_allowed)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_ORDER_TOTAL_SET . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_order_total_settings', '0', false, (tep_not_null($cInfo->customers_order_total_allowed)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_ORDER_TOTAL_DEFAULT ; } ?></td>
	  </tr>
<?php if ($processed != true) {
    $order_total_allowed = explode (";",$cInfo->customers_order_total_allowed);
    $order_total_module_active = explode (";",MODULE_ORDER_TOTAL_INSTALLED);
    $installed_order_total_modules = array();
    for ($i = 0, $n = sizeof($order_total_directory_array); $i < $n; $i++) {
    $file = $order_total_directory_array[$i];
    if (in_array ($order_total_directory_array[$i], $order_total_module_active)) {
      include(DIR_FS_CATALOG_LANGUAGES . $language . '/modules/order_total/' . $file);
      include($order_total_module_directory . $file);

     $order_total_class = substr($file, 0, strrpos($file, '.'));
     if (tep_class_exists($order_total_class)) {
       $order_total_module = new $order_total_class;
       if ($order_total_module->check() > 0) {
         $installed_order_total_modules[] = $file;
       }
     } // end if (tep_class_exists($order_total_class))
?>
          <tr>
            <td class="main" colspan="2"><?php echo tep_draw_checkbox_field('order_total_allowed[' . $i . ']', $order_total_module->code.".php" , (in_array ($order_total_module->code.".php", $order_total_allowed)) ?  1 : 0); ?>&#160;&#160;<?php echo $order_total_module->title; ?></td>
	  </tr>
<?php
  } // end if (in_array ($order_total_directory_array[$i], $order_total_module_active))
 } // end for ($i = 0, $n = sizeof($order_total_directory_array); $i < $n; $i++)
	?>
	   <tr>
            <td class="main" colspan="2" style="padding-left: 30px; padding-right: 10px; padding-top: 10px;"><?php echo ENTRY_CUSTOMERS_ORDER_TOTAL_SET_EXPLAIN ?></td>
           </tr>
<?php
   } else { // end if ($processed != true)
?>
	    <tr>
            <td class="main" colspan="2"><?php if ($cInfo->customers_order_total_settings == '1') {
		echo $customers_order_total_allowed;
	    } else {
		echo ENTRY_CUSTOMERS_ORDER_TOTAL_DEFAULT;
	    }
	    echo tep_draw_hidden_field('customers_order_total_allowed', $customers_order_total_allowed); ?></td>
	  </tr>
<?php
 } // end else: $processed == true
?>
	   </td>
	  </tr>
	 </table>
	</td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="formAreaTitle"><?php echo HEADING_TITLE_CUSTOMERS_TAX_RATES_EXEMPT; ?></td>
      </tr>
      <tr>
        <td class="formArea"><table border="0" cellspacing="2" cellpadding="2">
          <tr bgcolor="#DEE4E8">
            <td class="main" colspan="2"><?php if ($processed == true) {
            if ($cInfo->customers_tax_rate_exempt_settings == '1') {
		echo ENTRY_CUSTOMERS_TAX_RATES_EXEMPT ;
		echo ' : ';
	    } else {
		echo ENTRY_CUSTOMERS_TAX_RATES_DEFAULT;
	    }  
	    echo tep_draw_hidden_field('customers_tax_rate_exempt_settings');
            } else { // $processed != true
            echo tep_draw_radio_field('customers_tax_rate_exempt_settings', '1', false, (tep_not_null($cInfo->customers_specific_taxes_exempt)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_TAX_RATES_EXEMPT . '&nbsp;&nbsp;' . tep_draw_radio_field('customers_tax_rate_exempt_settings', '0', false, (tep_not_null($cInfo->customers_specific_taxes_exempt)? '1' : '0' )) . '&nbsp;&nbsp;' . ENTRY_CUSTOMERS_TAX_RATES_DEFAULT ; } ?></td>
	  </tr>
<?php if ($processed != true) {
   $customers_tax_ids_exempt = explode (",",$cInfo->customers_specific_taxes_exempt);
   $tax_query = tep_db_query("select tax_rates_id, tax_rate, tax_description from " . TABLE_TAX_RATES . " order by tax_rates_id");
   while ($tax_rate = tep_db_fetch_array($tax_query)) {
?>
	   <tr>
            <td class="main"><?php echo tep_draw_checkbox_field('customers_tax_rate_exempt_id[' . $tax_rate['tax_rates_id'] . ']', $tax_rate['tax_rates_id'] , (in_array($tax_rate['tax_rates_id'], $customers_tax_ids_exempt)) ? 1 : 0); ?>&#160;&#160;<?php echo $tax_rate['tax_description']; ?></td>
           </tr>
<?php
  } // end while ($tax_rate = tep_db_fetch_array($tax_query)) 
?>
	   <tr>
            <td class="main" colspan="2" style="padding-left: 30px; padding-right: 10px; padding-top: 10px;"><?php echo ENTRY_CUSTOMERS_TAX_RATES_EXEMPT_EXPLAIN ?></td>
           </tr>
<?php 
   } else { // end if ($processed != true)
?>
	    <tr>
            <td class="main" colspan="2"><?php if ($cInfo->customers_tax_rate_exempt_settings == '1') {
		echo $customers_specific_taxes_exempt;
	    } else {
		echo ENTRY_CUSTOMERS_TAX_RATES_DEFAULT;
	    } 
	    echo tep_draw_hidden_field('customers_specific_taxes_exempt', $customers_specific_taxes_exempt); ?></td>
	  </tr>
<?php 
 } // end else: $processed == true
?>
	   </td>
	  </tr>
	 </table>
	</td>
      </tr>
<!-- EOF Separate Pricing per Customer -->
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main">
<!--//#CHAVEIRO6# Step order/customer begin !-->
		<?php 
			if($action == 'new' || $action == 'insert') { echo tep_image_submit('button_insert.gif', IMAGE_INSERT) . ' <a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('action'))) .'">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; } 
		else { ?>
<!--//#CHAVEIRO6# Step order/customer end !-->	
	<?php echo tep_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('action'))) .'">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?>
<!--//#CHAVEIRO6# Step order/customer begin !-->
		<?php }	?>
<!--//#CHAVEIRO6# Step order/customer end !-->	
	      </td>
      </tr></form>
<?php
  } else {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr><?php echo tep_draw_form('search', FILENAME_CUSTOMERS, '', 'get'); ?>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td class="smallText" align="right"><?php echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('search'); ?></td>
          <?php echo tep_hide_session_id(); ?></form></tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
<?php  // BOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer
          switch ($_GET['listing']) {
              case "id-asc":
              $order = "c.customers_id";
	          break;
	          case "cg_name":
              $order = "cg.customers_group_name, c.customers_lastname";
	          break;
              case "cg_name-desc":
              $order = "cg.customers_group_name DESC, c.customers_lastname";
              break;
              case "firstname":
              $order = "c.customers_firstname";
              break;
              case "firstname-desc":
              $order = "c.customers_firstname DESC";
              break;
              case "company":
              $order = "a.entry_company, c.customers_lastname";
              break;
              case "company-desc":
              $order = "a.entry_company DESC,c .customers_lastname DESC";
              break;
              case "ra":
              $order = "c.customers_group_ra DESC, c.customers_id DESC";
              break;
              case "ra-desc":
              $order = "c.customers_group_ra, c.customers_id DESC";
              break;
              case "lastname":
              $order = "c.customers_lastname, c.customers_firstname";
              break;
              case "lastname-desc":
              $order = "c.customers_lastname DESC, c.customers_firstname";
              break;
              default:
              $order = "c.customers_id DESC";
          }
          ?>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent" valign="top"><a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=company'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_up.gif', SORT_BY_COMPANYNAME); ?></a>&nbsp;<a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=company-desc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_down.gif', SORT_BY_COMPANYNAME_DESC); ?></a><br><?php echo ENTRY_COMPANY; ?></td>
                <td class="dataTableHeadingContent" valign="top"><a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=lastname'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_up.gif', SORT_BY_LASTNAME); ?></a>&nbsp;<a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=lastname-desc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_down.gif', SORT_BY_LASTNAME_DESC); ?></a><br><?php echo TABLE_HEADING_LASTNAME; ?></td>
                <td class="dataTableHeadingContent" valign="top"><a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=firstname'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_up.gif', SORT_BY_FIRSTNAME); ?></a>&nbsp;<a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=firstname-desc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_down.gif', SORT_BY_FIRSTNAME_DESC); ?></a><br><?php echo TABLE_HEADING_FIRSTNAME; ?></td>
                <td class="dataTableHeadingContent" valign="top"><a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=cg_name'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_up.gif', SORT_BY_CUSTOMER_GROUP); ?></a>&nbsp;<a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=cg_name-desc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_down.gif', SORT_BY_CUSTOMER_GROUP_DESC); ?></a><br><?php echo TABLE_HEADING_CUSTOMERS_GROUPS; ?></td>
                <td class="dataTableHeadingContent" align="right" valign="top"><a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=id-asc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_up.gif', SORT_BY_ACCOUNT_CREATED); ?></a>&nbsp;<a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=id-desc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_down.gif', SORT_BY_ACCOUNT_CREATED_DESC); ?></a><br><?php echo TABLE_HEADING_ACCOUNT_CREATED; ?></td>
                <td class="dataTableHeadingContent" align="middle" valign="top"><a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=ra'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_up.gif', SORT_BY_RA); ?></a>&nbsp;<a href="<?php echo tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('listing','action', 'cID')) . 'listing=ra-desc'); ?>"><?php echo tep_image(DIR_WS_IMAGES . 'icon_down.gif', SORT_BY_RA_DESC); ?></a><br><?php echo TABLE_HEADING_REQUEST_AUTHENTICATION; ?>&nbsp;</td>
                <td class="dataTableHeadingContent" align="right" valign="top"><?php echo tep_draw_separator('pixel_trans.gif', '11', '12'); ?>&nbsp;<br><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php  // EOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer
    $search = '';
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
      $keywords = tep_db_input(tep_db_prepare_input($HTTP_GET_VARS['search']));
     // $search = "where c.customers_lastname like '%" . $keywords . "%' or c.customers_firstname like '%" . $keywords . "%' or c.customers_email_address like '%" . $keywords . "%'";
      $search = "where c.customers_lastname like '%" . $keywords . "%' or c.customers_firstname like '%" . $keywords . "%' or c.customers_email_address like '%" . $keywords . "%'";
    }
    // BOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer
    $customers_query_raw = "select c.customers_id, c.customers_lastname, c.customers_firstname, c.customers_email_address, c.customers_group_id, c.customers_group_ra, a.entry_country_id, a.entry_company, cg.customers_group_name from " . TABLE_CUSTOMERS . " c left join " . TABLE_ADDRESS_BOOK . " a on c.customers_id = a.customers_id and c.customers_default_address_id = a.address_book_id left join " . TABLE_CUSTOMERS_GROUPS . " cg on c.customers_group_id = cg.customers_group_id " . $search . " order by $order";
    // c.customers_lastname, c.customers_firstname";
    // EOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer

    $customers_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $customers_query_raw, $customers_query_numrows);
    $customers_query = tep_db_query($customers_query_raw);
    while ($customers = tep_db_fetch_array($customers_query)) {
      $info_query = tep_db_query("select customers_info_date_account_created as date_account_created, customers_info_date_account_last_modified as date_account_last_modified, customers_info_date_of_last_logon as date_last_logon, customers_info_number_of_logons as number_of_logons from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . $customers['customers_id'] . "'");
      $info = tep_db_fetch_array($info_query);

      if ((!isset($HTTP_GET_VARS['cID']) || (isset($HTTP_GET_VARS['cID']) && ($HTTP_GET_VARS['cID'] == $customers['customers_id']))) && !isset($cInfo)) {
        $country_query = tep_db_query("select countries_name from " . TABLE_COUNTRIES . " where countries_id = '" . (int)$customers['entry_country_id'] . "'");
        $country = tep_db_fetch_array($country_query);

        $reviews_query = tep_db_query("select count(*) as number_of_reviews from " . TABLE_REVIEWS . " where customers_id = '" . (int)$customers['customers_id'] . "'");
        $reviews = tep_db_fetch_array($reviews_query);

        $customer_info = array_merge($country, $info, $reviews);

        $cInfo_array = array_merge($customers, $customer_info);
        $cInfo = new objectInfo($cInfo_array);
      }

      if (isset($cInfo) && is_object($cInfo) && ($customers['customers_id'] == $cInfo->customers_id)) {
        echo '          <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customers_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '          <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID')) . 'cID=' . $customers['customers_id']) . '\'">' . "\n";
      }
// BOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer ?>
                <td class="dataTableContent"><?php
                if (strlen($customers['entry_company']) > 16 ) {
             print ("<acronym title=\"".$customers['entry_company']."\">".substr($customers['entry_company'], 0, 16)."&#160;</acronym>");
             } else {
                echo $customers['entry_company']; } ?></td>
                <td class="dataTableContent"><?php
                if (strlen($customers['customers_lastname']) > 15 ) {
             print ("<acronym title=\"".$customers['customers_lastname']."\">".substr($customers['customers_lastname'], 0, 15)."&#160;</acronym>");
             } else {
                echo $customers['customers_lastname']; } ?></td>
                <td class="dataTableContent"><?php
                if (strlen($customers['customers_firstname']) > 15 ) {
             print ("<acronym title=\"".$customers['customers_firstname']."\">".substr($customers['customers_firstname'], 0, 15)."&#160;</acronym>");
             } else {
            echo $customers['customers_firstname']; } ?></td>
		<td class="dataTableContent"><?php
                if (strlen($customers['customers_group_name']) > 17 ) {
             print ("<acronym title=\"".$customers['customers_group_name']."\"> ".substr($customers['customers_group_name'], 0, 17)."&#160;</acronym>");
             } else {
                echo $customers['customers_group_name'] ;
                }
// EOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer ?></td>
                <td class="dataTableContent" align="right"><?php echo tep_date_short($info['date_account_created']); ?></td>
                <td  class="dataTableContent" align="middle">
<?php
      if ($customers['customers_group_ra'] == '1') {
        echo tep_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_GREEN, 10, 10);
        } else {
        echo tep_draw_separator('pixel_trans.gif', '10', '10');
        } ?></td>
                <td class="dataTableContent" align="right"><?php if (isset($cInfo) && is_object($cInfo) && ($customers['customers_id'] == $cInfo->customers_id)) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID')) . 'cID=' . $customers['customers_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }
?>
              <tr><!-- BOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer colspan 4 to 7 -->
                <td colspan="7"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<!-- EOF customer_sort_admin_v1 adapted for Separate Pricing Per Customer -->
                  <tr>
                    <td class="smallText" valign="top"><?php echo $customers_split->display_count($customers_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_CUSTOMERS); ?></td>
                    <td class="smallText" align="right"><?php echo $customers_split->display_links($customers_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y', 'cID'))); ?></td>
                  </tr>
<?php
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
?>
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . tep_href_link(FILENAME_CUSTOMERS) . '">' . tep_image_button('button_reset.gif', IMAGE_RESET) . '</a>'; ?></td>
                  </tr>
<?php
    }
?>
                </table></td>
              </tr>
<!-- BOF Separate Pricing Per Customer: show numbers of customers in each customers group -->
<?php
   if (!isset($HTTP_GET_VARS['search'])) {
   $customers_groups_query = tep_db_query("select customers_group_id, customers_group_name from " . TABLE_CUSTOMERS_GROUPS . " order by customers_group_id ");
   while ($existing_customers_groups =  tep_db_fetch_array($customers_groups_query)) {
   $existing_customers_groups_array[] = array("id" => $existing_customers_groups['customers_group_id'], "text" => $existing_customers_groups['customers_group_name']);
   }
   $count_groups_query = tep_db_query("select customers_group_id, count(*) as count from " . TABLE_CUSTOMERS . " group by customers_group_id order by count desc");
   while ($count_groups = tep_db_fetch_array($count_groups_query)) {
	for ($n = 0; $n < sizeof($existing_customers_groups_array); $n++) {
		if ($count_groups['customers_group_id'] == $existing_customers_groups_array[$n]['id']) {
			$count_groups['customers_group_name'] = $existing_customers_groups_array[$n]['text'];
		}
	} // end for ($n = 0; $n < sizeof($existing_customers_groups_array); $n++)
	$count_groups_array[] = array("id" => $count_groups['customers_group_id'], "number_in_group" => $count_groups['count'], "name" => $count_groups['customers_group_name']);
   }
?>
              <tr>
	         <td style="padding-top: 10px;" align="center" colspan="7"><table border="0" cellspacing="0" cellpadding="2" style="border: 1px solid #c9c9c9">
		 <tr class="dataTableHeadingRow">
		 <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CUSTOMERS_GROUPS ?></td>
		 <td class="dataTableHeadingContent">&#160;</td>
		 <td class="dataTableHeadingContent" align="right">No.</td>
		 </tr>
<?php $c = '0'; // variable used for background coloring of rows
   for ($z = 0; $z < sizeof($count_groups_array); $z++) {
	  $bgcolor = ($c++ & 1) ? ' class="dataTableRow"' : '';
	   ?>
		 <tr<?php echo $bgcolor; ?>>
		 <td class="dataTableContent"><?php echo $count_groups_array[$z]['name']; ?></td>
		 <td class="dataTableContent">&#160;</td>
		 <td class="dataTableContent" align="right"><?php echo $count_groups_array[$z]['number_in_group'] ?></td>
		 </tr>
<?php
   } // end for ($z = 0; $z < sizeof($count_groups_array); $z++)
?>		 </table>
		 </td>
              <tr>
<?php
  } // end if (!isset($HTTP_GET_VARS['search']))
?>
<!-- EOF Separate Pricing Per Customer: show numbers of customers in each customers group -->
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    case 'confirm':
// BOF Separate Pricing Per Customer: dark grey field with customer name higher
      $heading[] = array('text' => ''. tep_draw_separator('pixel_trans.gif', '11', '12') .'&nbsp;<br><b>' . TEXT_INFO_HEADING_DELETE_CUSTOMER . '</b>');
// EOF Separate Pricing Per Customer
      $contents = array('form' => tep_draw_form('customers', FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customers_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_DELETE_INTRO . '<br><br><b>' . $cInfo->customers_firstname . ' ' . $cInfo->customers_lastname . '</b>');
      if (isset($cInfo->number_of_reviews) && ($cInfo->number_of_reviews) > 0) $contents[] = array('text' => '<br>' . tep_draw_checkbox_field('delete_reviews', 'on', true) . ' ' . sprintf(TEXT_DELETE_REVIEWS, $cInfo->number_of_reviews));
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customers_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (isset($cInfo) && is_object($cInfo)) {
// BOF Separate Pricing Per Customer: dark grey field with customer name higher
        $heading[] = array('text' => ''. tep_draw_separator('pixel_trans.gif', '11', '12') .'&nbsp;<br><b>' . $cInfo->customers_firstname . ' ' . $cInfo->customers_lastname . '</b>');
// EOF Separate Pricing Per Customer
//#CHAVEIRO6# Step order/customer begin
        $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'action=new') . '">' . tep_image_button('button_insert.gif', IMAGE_INSERT) . '</a> <a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')). 'cID=' . $cInfo->customers_id . '&action=edit') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_CUSTOMERS, tep_get_all_get_params(array('cID', 'action')) . 'cID=' . $cInfo->customers_id . '&action=confirm') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a> <a href="' . tep_href_link(FILENAME_ORDERS, 'cID=' . $cInfo->customers_id) . '">' . tep_image_button('button_orders.gif', IMAGE_ORDERS) . '</a> <a href="' . tep_href_link(FILENAME_MAIL, 'selected_box=tools&customer=' . $cInfo->customers_email_address) . '">' . tep_image_button('button_email.gif', IMAGE_EMAIL) . '</a>');
//#CHAVEIRO6# Step order/customer end 
        $contents[] = array('text' => '<br>' . TEXT_DATE_ACCOUNT_CREATED . ' ' . tep_date_short($cInfo->date_account_created));
        $contents[] = array('text' => '<br>' . TEXT_DATE_ACCOUNT_LAST_MODIFIED . ' ' . tep_date_short($cInfo->date_account_last_modified));
        $contents[] = array('text' => '<br>' . TEXT_INFO_DATE_LAST_LOGON . ' '  . tep_date_short($cInfo->date_last_logon));
        $contents[] = array('text' => '<br>' . TEXT_INFO_NUMBER_OF_LOGONS . ' ' . $cInfo->number_of_logons);
        $contents[] = array('text' => '<br>' . TEXT_INFO_COUNTRY . ' ' . $cInfo->countries_name);
        $contents[] = array('text' => '<br>' . TEXT_INFO_NUMBER_OF_REVIEWS . ' ' . $cInfo->number_of_reviews);
      }
      break;
  }

  if ( (tep_not_null($heading)) && (tep_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
