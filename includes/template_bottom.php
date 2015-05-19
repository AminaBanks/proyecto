<?php

?>

      </div> <!-- bodyContent //-->

<?php
  if ($oscTemplate->hasBlocks('boxes_column_left')) {
?>
		<!--Cette partie du code est a verifier car je n'ai pas complement fini-->
      <div id="columnLeft" class="col-md-<?php echo $oscTemplate->getGridColumnWidth(); ?>  col-md-pull-<?php echo $oscTemplate->getGridContentWidth(); ?>">
        <?php echo $oscTemplate->getBlocks('boxes_column_left'); ?>
      </div>

<?php
  }

  if ($oscTemplate->hasBlocks('boxes_column_right')) {
?>
	<!--Cette partie du code est a verifier car je n'ai pas complement fini-->
      <div id="columnRight" class="col-md-<?php echo $oscTemplate->getGridColumnWidth(); ?>">
        <?php echo $oscTemplate->getBlocks('boxes_column_right'); ?>
      </div>

<?php
  }
?>

    </div> <!-- row -->

  </div> <!-- bodyWrapper //-->

  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>

<script src="ext/bootstrap/js/bootstrap.min.js"></script>
<?php echo $oscTemplate->getBlocks('footer_scripts'); ?>

</body>
</html>