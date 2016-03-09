<?php

/**
 * @file
 * Display Suite fluid 2 column stacked template.
 */

  // Add sidebar classes so that we can apply the correct width in css.
  if (($left && !$right) || ($right && !$left)) {
    $classes .= ' group-one-column';
  }
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="ds-2col-stacked-fluid <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <<?php print $header_wrapper ?> class="group-header<?php print $header_classes; ?>">
    <?php print $header; ?>
  </<?php print $header_wrapper ?>>

  <?php if ($left): ?>
    <<?php print $left_wrapper ?> class="group-left<?php print $left_classes; ?>">

      <?php print $left; ?>
    </<?php print $left_wrapper ?>>
  <?php endif; ?>

<?php if ($right): ?>
    <<?php print $right_wrapper ?> class="group-right<?php print $right_classes; ?>">

      <div class='card large'>
        <div class='card-image white-text' style="max-height:50px">
            <img src='/sites/default/files/amber-darken1.jpg' height='80' width='400'>
            <span class='card-title' style='padding-bottom:8px;font-size:20px'>Important Details</span>
        </div>
        <div class='card-content'>
    
      <?php print $right; ?>
    </<?php print $right_wrapper ?>>
    
    	</div>
        <div class='card-action'>
          
          
        </div>
      </div>
    
  <?php endif; ?>

  <<?php print $footer_wrapper ?> class="group-footer<?php print $footer_classes; ?>">
    <?php print $footer; ?>
  </<?php print $footer_wrapper ?>>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
