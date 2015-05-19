<?php

 header('Content-Type: text/html; charset=utf-8');
  require('includes/application_top.php');
// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) { //ESTE IF PCOMPRUEBA SI HAY UN USUARIO CONEXTADO O NO
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
// the following cPath references come from application_top.php
  $category_depth = 'top';
  if (isset($cPath) && tep_not_null($cPath)) {
    $categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
    $categories_products = tep_db_fetch_array($categories_products_query);
    if ($categories_products['total'] > 0) {
      $category_depth = 'products'; // muestra products
    } else {
      $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");
      $category_parent = tep_db_fetch_array($category_parent_query);
      if ($category_parent['total'] > 0) {
        $category_depth = 'nested'; // se puede navegar a travers las categorias.
      } else {
        $category_depth = 'products'; // category has no products, but display the 'no products' message
      }
    }
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);

  require(DIR_WS_INCLUDES . 'template_top.php');

  if ($category_depth == 'nested') {
  //Consulta para seelctionar los nombres y las magenes de la tabla categorias y la tabla categorie_description
    $category_query = tep_db_query("select cd.categories_name, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");
	
	$category = tep_db_fetch_array($category_query); //en esta linea sacar todos los nombre, imagenes, de los productos 
	?>

	<div class="page-header">
	  <h1><?php echo $category['categories_name']; ?></h1><!--la salida de los nombre de los productos en formato html-->
	</div>

	<?php
	  if ($messageStack->size('product_action') > 0) {//Si el tamalo del product_action > 0 entonces puede hacer el echo de product_action
		echo $messageStack->output('product_action');
	  }
	?>

	<div class="contentContainer"><!-- creation del cuerpo-->
	  <div class="contentText">
		<div class="row">
	<?php

    if (isset($cPath) && strpos('_', $cPath)) {
// check to see if there are deeper categories within the current category pertenece a la parte de la categorias
      $category_links = array_reverse($cPath_array);//SACAR AL REVERSE LAS VARIABLES DEL ARRAY
      for($i=0, $n=sizeof($category_links); $i<$n; $i++) {//DESPUES RECORRERLO Y IR COGIENGO TODAS LAS POSITIONES. 
        //QUERY PARA CONTAR TODOS LAS CATEGORIAS DE LOS PRODUCTOS Y METERLOS EN TOTAL  
		$categories_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
        
		$categories = tep_db_fetch_array($categories_query);//CATEGIRIAS Y PASARLA EL RESULTADO DE LA QUERY. 
        if ($categories['total'] < 1) {
          // SI ESTE RESULTADO ES < 1 HO HAY NADA QUE VER.
        } else {
		//EN EL CASO CONTRARIO HACEMOS OTRA CQUERY PARA SACAR EL NOMBRE ID IMAGE, PARENT_ID DE LAS TABLAS CATEGIRIAS, TABLE_CATEGORIES_DESCRIPTION Y ORDENAR POR EL NOMBRE.
          $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
          break; // que encontrar la categoría más profundo que el cliente está seleccionando
        }
      }
    } else {
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
    }
	/*EN ESTA LINEA ES PARA SACAR POR PANTALLA */
    while ($categories = tep_db_fetch_array($categories_query)) {
      $cPath_new = tep_get_path($categories['categories_id']);
      echo '<div class="col-xs-6 col-sm-4">';
      echo '  <div class="text-center">';
      echo '    <a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . tep_image(DIR_WS_IMAGES . $categories['categories_image'], $categories['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT) . '</a>';
      echo '    <div class="caption text-center">';
      echo '      <h5><a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . $categories['categories_name'] . '</a></h5>';
      echo '    </div>';
      echo '  </div>';
      echo '</div>';
    }

	// necesaria para el módulo de nuevos productos se muestra a continuación
		$new_products_category_id = $current_category_id;
		?>
		  </div>

		  <br />

	<?php //include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?>

	  </div>
	</div>

	<?php
	  } elseif ($category_depth == 'products' || (isset($HTTP_GET_VARS['manufacturers_id']) && !empty($HTTP_GET_VARS['manufacturers_id']))) {
	// create column list
		$define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,//MODEL DEL PRODUCTO,
							 'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME, //NOMBRE,
							 'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER, //MANUFACTURER
							 'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE, //PRECIO
							 'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY, //QUANTITY
							 'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT, // EL PESO
							 'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE, //LA IMAGEN DE LIS PRODUCTOS
							 'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);	//COMPRAR AHORA LIST DE PRODUCTOS

		asort($define_list);// asort() SE VA UNO DEBAJO DE OTRO 

    $column_list = array(); //
    reset($define_list);//SE QUE REPITA RESET()
    while (list($key, $value) = each($define_list)) { //LIST DE CLAVES Y VALOR SON  
      if ($value > 0) $column_list[] = $key;//SI EL VALOR > 0 INICIALIZACION DEL $column_list[] DEL $COLUMN_LIST A LA CLAVE 
    }

    $select_column_list = '';//

    for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
      switch ($column_list[$i]) {
        case 'PRODUCT_LIST_MODEL':
          $select_column_list .= 'p.products_model, ';
          break;
        case 'PRODUCT_LIST_NAME':
          $select_column_list .= 'pd.products_name, ';
          break;
        case 'PRODUCT_LIST_MANUFACTURER':
          $select_column_list .= 'm.manufacturers_name, ';
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $select_column_list .= 'p.products_quantity, ';
          break;
        case 'PRODUCT_LIST_IMAGE':
          $select_column_list .= 'p.products_image, ';
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $select_column_list .= 'p.products_weight, ';
          break;
      }
    }

// VER LOS PAISES(FABRICANTES DE ESTOS PRODUCTOS
    if (isset($HTTP_GET_VARS['manufacturers_id']) && !empty($HTTP_GET_VARS['manufacturers_id'])) {
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// Se nos pide que muestre sólo una categoría específica
        $listing_sql = "select " . $select_column_list . " p.products_id, SUBSTRING_INDEX(pd.products_description, ' ', 20) as products_description, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
      } else {
// A todos ellos A mostrar
        $listing_sql = "select " . $select_column_list . " p.products_id, SUBSTRING_INDEX(pd.products_description, ' ', 20) as products_description, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
      }
    } else {
//mostrar los productos en un determinado categorie
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// Se nos pide que muestre sólo catgeory específica
        $listing_sql = "select " . $select_column_list . " p.products_id, SUBSTRING_INDEX(pd.products_description, ' ', 20) as products_description, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
      } else {
// A todos ellos A mostrar
        $listing_sql = "select " . $select_column_list . " p.products_id, SUBSTRING_INDEX(pd.products_description, ' ', 20) as products_description, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
      }
    }

    if ( (!isset($HTTP_GET_VARS['sort'])) || (!preg_match('/^[1-8][ad]$/', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {
      for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
        if ($column_list[$i] == 'PRODUCT_LIST_NAME') {
          $HTTP_GET_VARS['sort'] = $i+1 . 'a';
          $listing_sql .= " order by pd.products_name";
          break;
        }
      }
    } else {
      $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
      $sort_order = substr($HTTP_GET_VARS['sort'], 1);

      switch ($column_list[$sort_col-1]) {
        case 'PRODUCT_LIST_MODEL':
          $listing_sql .= " order by p.products_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_NAME':
          $listing_sql .= " order by pd.products_name " . ($sort_order == 'd' ? 'desc' : '');
          break;
        case 'PRODUCT_LIST_MANUFACTURER':
          $listing_sql .= " order by m.manufacturers_name " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_QUANTITY':
          $listing_sql .= " order by p.products_quantity " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_IMAGE':
          $listing_sql .= " order by pd.products_name";
          break;
        case 'PRODUCT_LIST_WEIGHT':
          $listing_sql .= " order by p.products_weight " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
        case 'PRODUCT_LIST_PRICE':
          $listing_sql .= " order by final_price " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
          break;
      }
    }

    $catname = HEADING_TITLE;
    if (isset($HTTP_GET_VARS['manufacturers_id']) && !empty($HTTP_GET_VARS['manufacturers_id'])) {
      $image = tep_db_query("select manufacturers_image, manufacturers_name as catname from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");
      $image = tep_db_fetch_array($image);
      $catname = $image['catname'];
    } elseif ($current_category_id) {
      $image = tep_db_query("select c.categories_image, cd.categories_name as catname from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
      $image = tep_db_fetch_array($image);
      $catname = $image['catname'];
    }
?>

<div class="page-header">
  <h1><?php echo $catname; ?></h1>
</div>

<div class="contentContainer">

<?php
// optional Product List Filter
 /*   if (PRODUCT_LIST_FILTER > 0) {
      if (isset($HTTP_GET_VARS['manufacturers_id']) && !empty($HTTP_GET_VARS['manufacturers_id'])) {
        $filterlist_sql = "select distinct c.categories_id as id, cd.categories_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where p.products_status = '1' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' order by cd.categories_name";
      } else {
        $filterlist_sql= "select distinct m.manufacturers_id as id, m.manufacturers_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_id = p2c.products_id and p2c.categories_id = '" . (int)$current_category_id . "' order by m.manufacturers_name";
      }
      $filterlist_query = tep_db_query($filterlist_sql);
      if (tep_db_num_rows($filterlist_query) > 1) {
        echo '<div>' . tep_draw_form('filter', FILENAME_DEFAULT, 'get') . '<p align="right">' . TEXT_SHOW . '&nbsp;';
        if (isset($HTTP_GET_VARS['manufacturers_id']) && !empty($HTTP_GET_VARS['manufacturers_id'])) {
          echo tep_draw_hidden_field('manufacturers_id', $HTTP_GET_VARS['manufacturers_id']);
          $options = array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES));
        } else {
          echo tep_draw_hidden_field('cPath', $cPath);
          $options = array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS));
        }
        echo tep_draw_hidden_field('sort', $HTTP_GET_VARS['sort']);
        while ($filterlist = tep_db_fetch_array($filterlist_query)) {
          $options[] = array('id' => $filterlist['id'], 'text' => $filterlist['name']);
        }
        echo tep_draw_pull_down_menu('filter_id', $options, (isset($HTTP_GET_VARS['filter_id']) ? $HTTP_GET_VARS['filter_id'] : ''), 'onchange="this.form.submit()"');
        echo tep_hide_session_id() . '</p></form></div>' . "\n";
      }
    }*/

    include(DIR_WS_MODULES . FILENAME_PRODUCT_LISTING);
?>

</div>

<?php
  } else { // default page
?>

<div class="page-header">
  <h1><?php echo HEADING_TITLE; ?></h1>
</div>

<?php
  if ($messageStack->size('product_action') > 0) {
    echo $messageStack->output('product_action');
  }
?>

<div class="contentContainer">
  <!--div class="alert alert-info">
    <?php //echo tep_customer_greeting(); ?>
	
  </div-->

<?php
    if (tep_not_null(TEXT_MAIN)) {
?>

  <div class="contentText">
    <?php echo TEXT_MAIN; ?>
  </div>

<?php
    }

   include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS);
   include(DIR_WS_MODULES . FILENAME_UPCOMING_PRODUCTS);
?>
	<!--<div id="sliderB">
		<img src="images/data1/images/bakikmitjana.jpg" alt="" title="" id="wows1_0"/>
		<img src="images/data1/images/p1020010_1.jpg" alt="" title="" id="wows1_1"/>
		<img src="images/data1/images/p1020348_1.jpg" alt="" title="" id="wows1_2"/>
		<img src="images/data1/images/p1020439_1.jpg" alt="" title="" id="wows1_3"/>
		<img src="images/data1/images/p1020447_1.jpg" alt="" title="" id="wows1_4"/>
		<img src="images/data1/images/p1020451_1.jpg" alt="" title="" id="wows1_5"/>
		<img src="images/data1/images/p1020457_1.jpg" alt="" title="" id="wows1_6"/>
		<img src="images/data1/images/p1020462_1.jpg" alt="" title="" id="wows1_7"/>
		<img src="images/data1/images/p1020465_1.jpg" alt="" title="" id="wows1_8"/>
		<img src="images/data1/images/p1020489_1.jpg" alt="" title="" id="wows1_9"/>
		<img src="images/data1/images/p1020599_1.jpg" alt="" title="" id="wows1_10"/>
		<img src="images/data1/images/p1020602_1.jpg" alt="" title="" id="wows1_11"/>
		<img src="images/data1/images/p1020612_1.jpg" alt="" title="" id="wows1_12"/>
		<img src="images/data1/images/p1020628_1.jpg" alt="" title="" id="wows1_13"/>
		<img src="images/data1/images/p1020658_1.jpg" alt="" title="" id="wows1_14"/>
		<img src="images/data1/images/p1020680_1.jpg" alt="" title="" id="wows1_15"/>
		<img src="images/data1/images/p1020717_1.jpg" alt="" title="" id="wows1_16"/>
		<img src="images/data1/images/p1020718_1.jpg" alt="" title="" id="wows1_17"/>
		<img src="images/data1/images/p1020727_1.jpg" alt="" title="" id="wows1_18"/>
		<img src="images/data1/images/p1020728_1.jpg" alt="" title="" id="wows1_19"/>
		<img src="images/data1/images/p1020747_1.jpg" alt="" title="" id="wows1_20"/>
		<img src="data1/images/p1020750_1.jpg" alt="full screen slider"/>
		<img src="images/data1/images/p1020791_1.jpg" alt="" title="" id="wows1_22"/>	
	</div>-->
</div>

<?php
  }

  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
