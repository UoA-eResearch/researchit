<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="row" style="margin-bottom:0px; padding-top:40px; padding-left:15%; padding-right:15%">
    <div class="col s12">
        <div class="card">
            <div class="card-image white-text" style="max-height:60px">
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="60" width="400">
                <span class="card-title" style="padding: 15px 15px 15px 20px;">Education, Training and Events</span>
            </div>
        </div>
    </div>
</div>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
