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

<div class="col s12 m12 l4">
  <div class="card hoverable small">
    <div class="card-image white-text">
      <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/red-darken1.jpg" alt="" height="10">
      <span class="card-title" style="font-weight:500; margin-top: 10px; line-height:32px;"><?php echo $fields['name']->content ?></span>
      <i class='material-icons large' style="position:absolute; color:white; top: 20px; right: 20px"><?php echo $fields['field_glypthcategory']->content ?></i>
    </div>
    <div class="card-content" style="padding-top:10px">
      <p style="margin-top:5px"><?php echo $fields['field_summary']->content ?></p>
    </div>
    <div class="card-action" style="padding: 0px; width: 100%; font-size: 0; border-top:0px">
      <?php
        $vocab = taxonomy_vocabulary_machine_name_load('research_life_cycle');
        $terms = taxonomy_get_tree($vocab->vid, 0, NULL, TRUE);
        $categoryTid = $fields['tid']->raw;
        $categoryNodes = taxonomy_select_nodes($categoryTid);
        foreach ($terms as $t) {
          $nodes = taxonomy_select_nodes($t->tid);
          $intersection = array_intersect($nodes, $categoryNodes);
          $height = count($intersection) / count($categoryNodes) * 15;
          echo "<span style='display:inline-block; vertical-align: bottom; text-align: center; width: 20%; background-color: {$t->field_color['und'][0]['rgb']}; height: {$height}px'></span>";
        }
      ?>
    </div>
  </div>
</div>
