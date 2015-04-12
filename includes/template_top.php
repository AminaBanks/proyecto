<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2014 osCommerce

  Released under the GNU General Public License
*/

  $oscTemplate->buildBlocks();

  if (!$oscTemplate->hasBlocks('boxes_column_left')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }

  if (!$oscTemplate->hasBlocks('boxes_column_right')) {
    $oscTemplate->setGridContentWidth($oscTemplate->getGridContentWidth() + $oscTemplate->getGridColumnWidth());
  }
?>
<!DOCTYPE html>
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta charset="<?php echo CHARSET; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1"/>
 <link href="./images/icons/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<title><?php echo "Fundaci&#x000F3; PROIDE -Fundaci&#x000F3;"/*tep_output_string_protected($oscTemplate->getTitle());*/ ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">

<link href="ext/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="custom.css" rel="stylesheet">
<link href="user.css" rel="stylesheet">

<!--[if lt IE 9]>
   <script src="ext/js/html5shiv.js"></script>
   <script src="ext/js/respond.min.js"></script>
   <script src="ext/js/excanvas.min.js"></script>
<![endif]-->
 
<script src="ext/jquery/jquery-1.11.1.min.js"></script>

<!-- font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<?php echo $oscTemplate->getBlocks('header_tags'); ?>

</head>
<body>
<!--De la linea 51 hasta la linea es la parte cabecera de la pagina donde he metido los redes sociales, los idiomas y el home -->
  <?php echo $oscTemplate->getContent('navigation'); ?>
  <nav class="navbar navbar-inverse navbar-no-corners navbar-no-margin" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>     
      
    </div>
    <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a class="store-brand" <?php echo 'href="' . tep_href_link(FILENAME_DEFAULT) . '"'; ?>><i class="glyphicon glyphicon-home"></i><span class="hidden-sm"> &nbsp&nbsp<?php echo   HEADER_TITLE_HOME?></span></a></li> <!-- FALTA SABER EL NOMBRE DE HOME EN LA TABLA-->
          <li>
			<a class="store-brand" <?php echo 'href="'.tep_href_link(FILENAME_ACCOUNT, '', 'SSL').'"';?>><i class="glyphicon glyphicon-user"></i> <span clas="hidden-sm">&nbsp&nbsp<?php echo HEADER_TITLE_MY_ACCOUNT?></span></a></li>
		</li> 
          	<!--el codigo de los idiomas -->          
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-flag"></i><span class="hidden-sm"> <?php echo HEADER_LANG?></span> <span class="caret"></span></a>
              <ul class="dropdown-menu">			   
                <li class="text-center text-muted bg-primary"><abbr title="Selected Language"><?PHP echo HEADER_L; ?></abbr> <?php  echo $language ;?>
                <li class="divider"></li>
								
				<li><a href="http://artesania.fundacioproide.org/index.php?language=ca"><?PHP echo LANGUAGE_1;?></a></li>
				<li><a href="http://artesania.fundacioproide.org/index.php?language=en"><?PHP echo LANGUAGE_3;?></a></li>
				<li><a href="http://artesania.fundacioproide.org/index.php?language=fr"><?PHP echo LANGUAGE_4;?></a></li>
				<li><a href="http://artesania.fundacioproide.org/index.php?language=es"><?PHP echo LANGUAGE_2;?></a></li>			
			</ul>
		</li> 
		  
		<li>
			<a class="store-brand" <?php echo 'href="'.tep_href_link(FILENAME_SHOPPING_CART, '', 'SSL').'"';?>><i class="glyphicon glyphicon-shopping-cart"></i><span class="items">&nbsp&nbsp<?php echo $cart->count_contents() ?>&nbsp&nbsp<?php echo HEADER_TITLE_NAME_PRODUCTS?> </span></a> 
		</li>  	  
		
		 </ul>
		 		 
        <ul> 
 <li class="nav navbar-text navbar-right">
	<a href="http://www.facebook.com/fundacioproide"><img src="images/social_bookmarks/facebook.png"/></a>
 </li>
 <li class="nav navbar-text navbar-right">
	<a href="https://www.youtube.com/user/CanalProide"><img src="images/social_bookmarks/youtube.png"/></a>
 </li>
 <li class="nav navbar-test nav navbar-right" style="width:30%; margin-top:1%;"> 
   <form  name="quick_find" <?php //echo'action="'.tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false).'"';?> method="get" class="form-horizontal">  
    <div class="input-group">
     <input name="keywords"   placeholder="buscar pel nom del producte" class="form-control" type="text"><span class="input-group-btn">
     <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></button></span>  
    </div>
   </form>
 </li>      
        
      </ul>        
      </div>
    </div>
  </div>
</nav><!-- 91 se termina la cabecera de nav la parte  de los idiomas y todo esto -->
  
  <div id="bodyWrapper" class="<?php echo BOOTSTRAP_CONTAINER; ?>">
    <div class="row">

	<!--Llama al fichero header.php para ejecutar este fichero -->
      <?php require(DIR_WS_INCLUDES . 'header.php'); ?>

      <div id="bodyContent" class="col-md-<?php echo $oscTemplate->getGridContentWidth(); ?> <?php echo ($oscTemplate->hasBlocks('boxes_column_left') ? 'col-md-push-' . $oscTemplate->getGridColumnWidth() : ''); ?>">
