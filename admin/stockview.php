<?php
/*
  $Id: stockview.php,v 1.00 2005/03/07

  osCommerce Simple StockViewer

  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2005 osCommerce

  Released under the GNU General Public License
*/

require('includes/application_top.php');

require(DIR_WS_INCLUDES . 'template_top.php');

?>

<table border="0" width="100%" cellspacing="2" cellpadding="2">
<tr>

</tr>
<?

$total=1;
?>
<tr class="dataTableHeadingRow">

	<td><b>Nom du producte</b></td>


	<td><b>Quantitat</b></td> 
	</tr>
	<tr class="dataTableRow">

   <?php
 $check_address_query = tep_db_query("SELECT p.products_quantity, pd.products_name from products p 
 inner join products_description pd  where p.products_id=pd.products_id and p.products_quantity < 2 and pd.language_id=4 ORDER BY PD.PRODUCTS_NAME");
	
    while ($categories = tep_db_fetch_array( $check_address_query)) {
    
	?>


 <tr>     
	<td>     <?php echo ($categories ['products_name']); ?>
 </td>
 <td>     <?php echo ($categories ['products_quantity']); ?>
 </td>
 </tr>
 <?php
}
?>
 </td></tr></table>

<br>
<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>