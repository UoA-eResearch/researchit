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

      
      
      <?php
        if (!empty($node->field_request_service_form)) {
          $desc = !empty($node->field_request_service_form_descr) ? $node->field_request_service_form_descr['und'][0]['value'] : 'Signup here:';
          foreach ($node->field_request_service_form['und'] as $i => $field) {
            $label = $field['value'];
            $desc .= "<div class='row'>
                        <div class='input-field col s12'>
                          <input placeholder='$label' id='$label' type='text' class='validate'>
                          <label class='active validate' for='$label'>$label</label>
                        </div>
                      </div>";
          }
          $desc .= "<button class='btn waves-effect waves-light' type='submit'    name='action'>Submit<i class='material-icons right'>send</i></button>";
          echo "<button class='waves-effect waves-light btn-large modal-trigger' data-target='request'><i class='material-icons right'>send</i>Request Service</button>
              <div id='request' class='modal'>
                <div class='modal-content'>
                  <h4>Request Service</h4>
                  <p>$desc</p>
                </div>
                <div class='modal-footer'>
                  <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Dismiss</a>
                </div>
              </div>";
        } else {
          $url = $node->field_link['und'][0]['url'];
          echo "<a class='waves-effect waves-light btn-large' href='$url'><i class='material-icons right'>send</i>Launch $title</a>";
        }
      ?>
      
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
