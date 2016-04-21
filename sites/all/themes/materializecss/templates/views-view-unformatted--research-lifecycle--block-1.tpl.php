<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 $vocab = taxonomy_vocabulary_machine_name_load('research_life_cycle');
 $terms = taxonomy_get_tree($vocab->vid, 0, NULL, TRUE);
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<?php
foreach ($terms as $t) {
  $machine_name = str_replace(' &', '', $t->name);
  $machine_name = str_replace(' ', '_', $machine_name);
  echo "<span class='lifecycle_selector $machine_name' style='display:inline-block;text-align:center;padding:20px;color:white;font-family:Roboto,sans-serif;font-size:20px;font-weight:normal;width:20%;background-color:{$t->field_color['und'][0]['rgb']}'>{$t->name}</span>";
}
?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
