<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  if ($messageStack->size('header') > 0) {
    echo '<div class="col-md-12">' . $messageStack->output('header') . '</div>';
  }
?>

<div class="modular-header" > <!-- revisar-->
  <!--<div id="storeLogo" class="col-sm-2 col-xs-4" style="margin-top:4%; border: solid:1px;"> reemplazar esta a esta linea de abajo
  <div id="storeLogo" class="col-sm-2 img-responsive">  -->
  <div class="logo_responsive" > 
	<img src="images/store_logo.png">

  </div> 
  <div id="storeLogo" class="col-sm-2 img-responsive1"> 
  <?php //echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image(DIR_WS_IMAGES . 'store_logo.png', STORE_NAME) . '</a>'; ?>
		<img src="images/store_logo.png">	<!--<a href="http://www.template.me.uk/2334bs3/index.php"><img src="images/store_logo.png" alt="osCommerce" title="osCommerce" class="img-responsive" height="50" width="200"></a></div>-->
  </div>

<div class="col-sm-10">

		<script src="js/jquery-1.9.1.min.js"></script>
    <script src="slider/js/jquery.excoloSlider.js"></script>
    <link href="slider/css/jquery.excoloSlider.css" rel="stylesheet" />

    <script>
        // Settings for Adaptive.js
        var ADAPT_CONFIG = {
            path: 'css/',
            dynamic: true,
            range: [
                '0px    to 760px  = mobile.min.css',
                '760px  to 980px  = 720.min.css',
                '980px            = 960.min.css'
            ]
        };

    </script>
    <script src="js/adapt.min.js"></script>
    <script type="text/javascript">
        SyntaxHighlighter.config.tagName = "code";
    </script>


    <script>
        $(function () {
            $("#sliderA").excoloSlider();
            $("#sliderB").excoloSlider();
            
        });
    </script>		
			<div id="sliderA" class="slider" style="margin-top:2px;">
				<img src="slider/images/image1.jpg" alt=""/>
				<img src="slider/images/image2.jpg" alt=""/>				
				<img src="slider/images/image4.jpg" alt=""/>				
				<img src="slider/images/image1_8.jpg" alt=""/>	
				<img src="slider/images/group1.jpg" alt=""/>
				<img src="slider/images/groupe2.jpg" alt=""/>
				<img src="slider/images/group3.jpg" alt=""/>	
				<img src="slider/images/group4.jpg" alt=""/>
				<img src="slider/images/group5.jpg" alt=""/>			
			</div>
</div>
	<!--EL SCRIP DEL MENU ************************************************************************-->
<script> var ww = document.body.clientWidth;

$(document).ready(function() {
 $(".navmenu li a").each(function() {
  if ($(this).next().length > 0) {
   $(this).addClass("parent");
  };
 })
 
 $(".toggleMenu").click(function(e) {
  e.preventDefault();
  $(this).toggleClass("active");
  $(".navmenu").toggle();
 });
 adjustMenu();
})

$(window).bind('resize orientationchange', function() {
 ww = document.body.clientWidth;
 adjustMenu();
});

var adjustMenu = function() {
 if (ww < 768) {
  $(".toggleMenu").css("display", "inline-block");
  if (!$(".toggleMenu").hasClass("active")) {
   $(".navmenu").hide();
  } else {
   $(".navmenu").show();
  }
  $(".navmenu li").unbind('mouseenter mouseleave');
  $(".navmenu li a.parent").unbind('click').bind('click', function(e) {
   // must be attached to anchor element to prevent bubbling
   e.preventDefault();
   $(this).parent("li").toggleClass("hover");
  });
 } 
 else if (ww >= 768) {
  $(".toggleMenu").css("display", "none");
  $(".navmenu").show();
  $(".navmenu li").removeClass("hover");
  $(".navmenu li a").unbind('click');
  $(".navmenu li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
    // must be attached to li so that mouseleave is not triggered when hover over submenu
    $(this).toggleClass('hover');
  });
 }
}
</script>	

	<!--HASTA AQUI MENU LATERAL EMPIEZA AQUI -->
	<!--<div class="col-sm-12"> 
		
		
		<div class="containermenu">

<a class="toggleMenu" href="#">Menu</a>
<ul class="navmenu">
  <li > <a href="#"><?php echo M_CATEGORY; ?></a>
  <ul>
<?php	
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '0' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name limit 0,79");
      while ($categories = tep_db_fetch_array($categories_query))  {
	?>		
        
			<li><a href="<?php echo tep_href_link(FILENAME_DEFAULT, 'cPath='.$categories['categories_id']); ?>"  class="current" rel="images/"><?php echo $categories['categories_name']; ?></a>
			<?php if (tep_has_category_subcategories($categories['categories_id'])) { ?>
				<ul>
					<?php
					$categories_query_1 = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '".$categories['categories_id']."' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name");
					while ($categories_1 = tep_db_fetch_array($categories_query_1))  {
					?>	
					<li ><a href="<?php echo tep_href_link(FILENAME_DEFAULT, 'cPath='.$categories['categories_id'].'_'.$categories_1['categories_id']); ?>" rel="images/products/sub_14.png"><?php echo $categories_1['categories_name']; ?></a>
						<?php if (tep_has_category_subcategories($categories_1['categories_id'])) { ?>
						<ul >
							<?php
							$categories_query_2 = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '".$categories_1['categories_id']."' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name");
							while ($categories_2 = tep_db_fetch_array($categories_query_2))  {
							?>
							<li ><a href="<?php echo tep_href_link(FILENAME_DEFAULT, 'cPath='.$categories['categories_id'].'_'.$categories_1['categories_id'].'_'.$categories_2['categories_id']); ?>"><?php echo $categories_2['categories_name']; ?></a></li>
							<?php } ?>
						</ul>
						<?php } ?>
					</li>
					<?php } ?>
				</ul>
			<?php } ?>	
			</li> 
		
		<?php } ?>	
			</ul>
			</li>
			<li> <a href="#"><?php echo M_MANUFACTURER; ?></a>
			<ul >
			<?php
	      $manufacturers_query = tep_db_query("select manufacturers_id, manufacturers_name from " . TABLE_MANUFACTURERS . " order by manufacturers_name");
	   	while ($manufacturers = tep_db_fetch_array($manufacturers_query)) {  ?>
	  <li ><a href=" <?php echo tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturers['manufacturers_id']);?> ">  <?php echo $manufacturers['manufacturers_name'];?> </a></li>	
		<?php
					}
	  ?>
	  
		</ul>
			
			</li>
			 <li><a href="#"><?php echo M_CONTACT; ?></a>
			 <ul >    
      
      <li><a href="<?php echo tep_href_link('conditions.php'); ?>"><?php echo MODULE_BOXES_INFORMATION_BOX_CONDITIONS; ?></a></li>
      <li><a href="<?php echo tep_href_link('contact_us.php'); ?>"><?php echo MODULE_BOXES_INFORMATION_BOX_CONTACT; ?></a></li>
	  <li><a href="<?php echo tep_href_link('privacy.php'); ?>"><?php echo MODULE_BOXES_INFORMATION_BOX_PRIVACY; ?></a></li>
    </ul>
			</li>
		</ul>

</div>
</div>
		
		MENU LATERAL TERMINA AQUI 
	</div>
</div>-->



<div class="clearfix"></div>

<div class="body-sans-header clearfix">

<?php
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<div class="clearfix"></div>
<div class="col-xs-12">
  <div class="alert alert-danger">
    <a href="#" class="close glyphicon glyphicon-remove" data-dismiss="alert"></a>
    <?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?>
  </div>
</div>
	
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<div class="clearfix"></div>
<div class="col-xs-12">
  <div class="alert alert-info">
    <a href="#" class="close glyphicon glyphicon-remove" data-dismiss="alert"></a>-->
    <?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?>
  </div>
</div>
<?php
  }
?>

