<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<!--
<div class="row" style="margin-bottom:0px; padding-top:40px">
	<div class="col s12">
    	<div class="card">
            <div class="card-image white-text" style="max-height:60px">
                <?php //echo $fields['field_card_image']->content ?>
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/red-darken1.jpg" alt="" height="60px" width="400">
                <span class="card-title" style="padding: 15px 15px 15px 20px;">Service Categories</span>
            </div>
    	</div>
    </div>
</div>
-->

<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
