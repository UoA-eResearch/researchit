<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<h3>Research Lifecycle</h3>
<div class='rows' style='padding-bottom: 200px;'>
  <?php foreach ($rows as $id => $row): ?>
    <div class='row' style=''>
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>
</div>
