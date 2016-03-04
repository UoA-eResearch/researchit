<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<div class="col s4">
  <div class="card blue-grey darken-1">
    <div class="card-content white-text">
      <span class="card-title"><?php echo $fields['name']->content ?></span>
      <p><?php echo $fields['description']->content . '<br><ul class="nodes">';
          foreach (taxonomy_select_nodes($fields['tid']->raw) as $i => $nid) {
            if ($i > 2) break;
            $nodeTitle = node_load($nid)->title;
            $link = l($nodeTitle, 'node/'.$nid);
            echo "<li class='node'>$link</li>";
          }
          echo '</ul>';
      ?></p>
    </div>
    <div class="card-action">
      <?php echo str_replace($fields['name']->raw, 'More info', $fields['name']->content) ?>
      <?php echo $fields['field_chooser']->content  ?>
    </div>
  </div>
</div>