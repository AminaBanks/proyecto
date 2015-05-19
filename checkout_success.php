<?php

	/*EN ESTE FICHERO VOY A INSERTAR LA PARTE DEL CORREO CUANDO LOS SOCIOS HACEN LOS PEDIDOS QUE SE LLEGA UN MAIL A PROIDE PARA DECIR QUE EL MAIL LOS SOCIOS HAN HECHO EL PEDIDO 
	EJEMPLO DE HE VISTO EN INTERNET NO (que una vez realizado el pedido se envía un correo a PROYDE para informarle que hay un nuevo pedido).
	AQUI SALE SI EL PEDIDO SE HA PODIDO REALIZAR CON EXITO 
	*/
  header("Content-type: text/html; charset=utf-8");
  require('includes/application_top.php');

// if the customer is not logged on, redirect them to the shopping cart page
  if (!tep_session_is_registered('customer_id')) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

  $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");

// redirect to shopping cart page if no orders exist
  if ( !tep_db_num_rows($orders_query) ) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

  $orders = tep_db_fetch_array($orders_query);

  $order_id = $orders['orders_id'];

  $page_content = $oscTemplate->getContent('checkout_success');

  if ( isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'update') ) {
    tep_redirect(tep_href_link(FILENAME_DEFAULT));
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_SUCCESS);//AÑADIR EL FICHERO DE LOS IDIOMAS

  $breadcrumb->add(NAVBAR_TITLE_1);
  $breadcrumb->add(NAVBAR_TITLE_2);

  require(DIR_WS_INCLUDES . 'template_top.php');
?>

<div class="page-header"><!-- LA PARTE DE PAGE-FOOTER-->
  <h1><?php echo HEADING_TITLE; ?></h1>
</div>

<?php echo tep_draw_form('order', tep_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=update', 'SSL', 'class="form-horizontal"')); ?>

<div class="contentContainer">
  <?php echo $page_content; ?>
</div>

<div class="contentContainer">
  <div class="buttonSet">
    <div class="text-right"><?php echo tep_draw_button(IMAGE_BUTTON_CONTINUE, 'glyphicon glyphicon-chevron-right', null, 'primary', null, 'btn-success'); ?></div>
  </div>
</div>

</form>

<?php
  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
  require ('mail_confirmation.php'); //AQUI INSERTO LA PARTE DE LA CONFIRMACION DEL MAIL QUE SE TIENE QUE LLEGAR A LA HELENA. UNA VEZ HECHO ESTO ELLA RECIBIRA UN MAIL 
?>
