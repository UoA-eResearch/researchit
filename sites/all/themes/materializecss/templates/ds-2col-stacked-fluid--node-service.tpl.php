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
    <<?php print $left_wrapper ?> class="group-left flow-text<?php print $left_classes; ?>">

      <?php print $left; ?>
    </<?php print $left_wrapper ?>>
  <?php endif; ?>

<?php if ($right): ?>
    <<?php print $right_wrapper ?> class="group-right flow-text<?php print $right_classes; ?>">

      
      
      <?php

      
        if (!empty($node->field_request_service_form)) {
          $desc = !empty($node->field_request_service_form_descr) ? $node->field_request_service_form_descr['und'][0]['value'] : 'Signup here:';
          $email = $node->field_contact_email['und'][0]['email'];
          $form = "<form id='request_service_form' contact='$email' service='$title'>";
          foreach ($node->field_request_service_form['und'] as $i => $field) {
            $label = $field['value'];
            $form .= "<div class='row'>
                        <div class='input-field col s12'>
                          <input placeholder='$label' id='$label' type='text' class='validate'>
                          <label class='active validate' for='$label'>$label</label>
                        </div>
                      </div>";
          }
          $form .= "<button id='request_service_form_submit' class='btn waves-effect waves-light'>Submit<i class='material-icons right'>send</i></button></form>";
          echo "<button class='waves-effect waves-light btn-large modal-trigger' data-target='request'><i class='material-icons right'>send</i>Request Service</button>
              <div id='request' class='modal'>
                <div class='modal-content'>
                  <h4>Request Service</h4>
                  <p>$desc</p>
                  $form
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
      
      <div class='card'>
        <div class='card-image white-text' style="max-height:50px">
            <img src='/sites/default/files/amber-darken1.jpg' height='50' width='400'>
            <span class='card-title' style='padding-bottom:8px;font-size:20px'>Important Details</span>
        </div>
        <div class='card-content'>
    
      <?php print $right; ?>
    </<?php print $right_wrapper ?>>
    
    	</div>
        <div class='card-action'>
          
          
        </div>
        
        <?php
        $url = $node->field_link['und'][0]['url'];
        $headers = @get_headers($url);
        $status = substr($headers[0], 9, 3);
        $valid_statuses = array(200, 301, 302);
        if (in_array($status, $valid_statuses)) {
          $color = 'green';
          $text = 'Online';
        } else {
          $color = 'red';
          $text = 'Offline';
        }
        print "Current status: <div class='status chip $color'>$text</div><br><br>";
        
        $other = array('field_help_faqs' => 'chat_bubble_outline', 'field_see_also' => 'info_outline', 'field_related_services' => 'play_circle_outline');
        
        echo "<ul class='collection'>";
        foreach ($other as $o => $i) {
          $d = $node->$o;
          $name = field_info_instance('node', $o, 'service');
          $name = $name['label'];
          echo "
            <li class='collection-item avatar'>
                <i class='material-icons circle grey'>$i</i>
                <span class='title'>$name</span>";
          foreach ($d['und'] as $e) {
            if (!empty($e['url'])) {
              $url = $e['url'];
              $t = $e['title'];
              print "<p><a href='$url'>$t</a></p>";
            } else if (!empty($e['target_id'])) {
              $nid = $e['target_id'];
              $node = node_load($nid);
              $link = l($node->title, 'node/'.$nid);
              print "<p>$link</p>";
            }
          }
          echo '</li>';
        }
        echo "</ul>";
        
        ?>
    </<?php print $left_wrapper ?>>
  <?php endif; ?>

  <<?php print $footer_wrapper ?> class="group-footer<?php print $footer_classes; ?>">
    <?php print $footer; ?>
  </<?php print $footer_wrapper ?>>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
