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
                <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/deep-purple-darken1.jpg" alt="" height="60px" width="400">
                <span class="card-title" style="padding: 15px 15px 15px 20px;">Guides</span>
            </div>
    	</div>
    </div>
</div>
-->
<h5 style="float:left; margin-left:-14%; position:absolute; color:white; font-weight:400; margin-top:-20px">Guides</h5>

<div class="row">
	<?php foreach ($rows as $id => $row): ?>
     <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
        <?php print $row; ?>
     </div>
    <?php endforeach; ?>
</div>

<h6 style="float:right; margin-left:72%; position:absolute; color:white; font-weight:300;">View All Guides <i class="material-icons" style="font-size:1rem">info_outline</i></h6>
