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
?>

<div class="col s12 m12 research_lifecycle_stage <?php echo $machine_name ?>">
    <div class="card" style="border: solid 2px <?php echo $fields['field_color']->content ?>; border-top: 4px solid <?php echo $fields['field_color']->content ?>">
        <div class="card-content">
          <!--<span class="card-title activator grey-text text-darken-4"><?php echo $fields['name']->raw ?></span>-->


            <?php
              $categorySorted = array();
              foreach (taxonomy_select_nodes($fields['tid']->raw) as $i => $nid) {
                $node = node_load($nid);
                $tid = $node->field_category['und'][0]['tid'];
                $term = taxonomy_term_load($tid);
                if (empty($categorySorted[$tid])) {
                  $categorySorted[$tid] = array();
                  $categorySorted[$tid]['term'] = $term;
                  $categorySorted[$tid]['nodes'] = array();
                }
                $categorySorted[$tid]['nodes'][] = $node;
              }
			  print "<div class='row'>";
			  print "<div class='col s12 cards-container'>";
              uasort($categorySorted, function($a, $b) {
                return count($a['nodes']) < count($b['nodes']);
              });
              foreach ($categorySorted as $tid => $t) {
                $term = $t['term'];
                $term_title = taxonomy_term_title($term);
                $link = taxonomy_term_uri($term);
                $link = drupal_get_path_alias($link['path']);

                // Prints out the service category title
				print "<div class='card featured'>";
                print "<a href='$link' style='color: rgba(0, 70, 127, 0.9)'><h5>$term_title</h5></a>";
                print "<ul class='collection'>";
                usort($t['nodes'], "materialize_compare_type");

                foreach ($t['nodes'] as $node) {
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
                  $color = '#0080A7';
				          $glyph = "settings";
                  if ($node->type == 'guide') {
                    $color = '#9A9EFF';
					          $glyph = "import_contacts";
                  }

                  // Prints out the actual service
                  echo "<a href='$link' class='collection-item avatar'>
                          <i class='material-icons circle' style='background-color:$color; font-size:24px;'>$glyph</i>
                          <span class='title' style='color: #0080a7; font-weight: 500'>{$node->title}</span>
                          <p style='color:black; font-weight: 300'>$desc</p>
                        </a>";
                }
				print "</ul>";
				print "</div>";
              }
			  print "</div>";
			  print "</div>";
            ?>


        </div>
    </div>
</div>
