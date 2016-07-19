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
  $machine_name = str_replace(' &', '', $fields['name']->raw);
  $machine_name = str_replace(' ', '_', $machine_name);
  echo "<div class='card category $machine_name' style='display:none;min-height: 800px;margin:0'>
  <div class='row' style='background-color: #0080A7; margin: 0px; color: white; height: 60px; padding: 15px; font-size:24px'>{$fields['name']->raw}</div>
  <div class='card-content row'><div class='col s12 cards-container'>";
  $nodes = taxonomy_select_nodes($fields['tid']->raw);
  $lifecycleSorted = array();
  foreach ($nodes as $i => $nid) {
    $node = node_load($nid);
    if (empty($node->field_research_lifecycle_stage['und'])) continue;
    $tids = $node->field_research_lifecycle_stage['und'];
    foreach ($tids as $t) {
      $tid = $t['tid'];
      if (empty($lifecycleSorted[$tid])) {
        $lifecycleSorted[$tid] = array();
      }
      $lifecycleSorted[$tid][] = $node;
    }
  }

  foreach ($lifecycleSorted as $tid => $nodes) {
    $term = taxonomy_term_load($tid);
    $color = $term->field_color['und'][0]['rgb'];
    $glyph = $term->field_glypth['und'][0]['value'];
    $term_title = taxonomy_term_title($term);
    $link = taxonomy_term_uri($term);
    $link = drupal_get_path_alias($link['path']);
    print "<div class='card'>
            <h5>
              <a href='$link'><div style='background-color:$color;text-align:center;padding:15px;color:white;font-family:Roboto,sans-serif;font-size:20px;font-weight:normal;'><i class='material-icons circle'>$glyph</i>$term_title</div></a>
            </h5>
            <ul class='collection'>";
    foreach ($nodes as $node) {
      $link = url('node/'.$node->nid);
      if (!empty($node->summary)) {
        $desc = $node->summary;
      } else {
        if ($node->type == 'guide') {
          $desc = 'Explore this topic';
        } else {
          $desc = 'Learn more about this service';
        }
      }
      $glyph = "settings";
      $color = "#0080A7";
      if ($node->type == 'guide') {
        $glyph = "import_contacts";
        $color = "#9A9EFF";
      }
      echo "<a href='$link' class='collection-item avatar'>
              <i class='material-icons circle' style='background-color:$color; font-size:24px;'>$glyph</i>
              <span class='title' style='color: #0080a7;'>{$node->title}</span>
              <p style='color:black; font-weight: 300'>$desc</p>
            </a>";
    }
    print "</div></ul>";
  }

  echo "</div></div></div>";
