<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<a id='policies' class='anchor'></a>
<h5 style="float:left; margin-left:-14%; position:absolute; color:rgb(255,179,0); font-weight:400; margin-top:-20px">Policies</h5>

<div class="row">
  <?php foreach ($rows as $id => $row): ?>
    <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>
</div>

<h6 style="float:right; margin-left:72%; position:absolute; color:rgb(255,179,0); font-weight:300;">View All Policies <i class="material-icons" style="font-size:1rem">info_outline</i></h6>
