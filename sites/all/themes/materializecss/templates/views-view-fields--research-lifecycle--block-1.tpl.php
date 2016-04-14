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
 if (!empty($row->field_field_card_image[0]['raw']['uri'])) {
   $url = file_create_url($row->field_field_card_image[0]['raw']['uri']);
 } else {
   $url = '/sites/default/files/yellow-leather.jpg';
 }
?>

<div class="col s12 m12 research_lifecycle_stage <?php echo $machine_name ?>" <?php if ($machine_name != "Plan_Design") echo 'style="display:none"' ?>>
    <div class="card">
      <div class="background" style="background-color:<?php echo $fields['field_color']->content ?>;opacity:.2;position:absolute;top:0;left:0;width:100%;height:100%;z-index: 1;pointer-events: none;"></div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $fields['name']->raw ?></span>

          
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
                print "<a href='$link'><h5>$term_title</h5></a>";
                print "<ul class='collection'>";
                usort($t['nodes'], "materialize_compare_type");
                            
                foreach ($t['nodes'] as $node) {
                  $link = l($node->title, 'node/'.$node->nid);
                  if (!empty($node->body['und'][0]['summary'])) {
                    $desc = $node->body['und'][0]['summary'];
                  } else {
                    $desc = 'What should I know?';
                  }
                  $color = 'red';
				  $glyph = "dashboard";
                  if ($node->type == 'guide') {
                    $color = 'purple';
					$glyph = "insert_chart";
                  }
                              
                  // Prints out the actual service
                  echo "<li class='collection-item avatar'>
                          <i class='material-icons circle $color'>$glyph</i>
                          <span class='title'>$link</span>
                          <p>$desc</p>
                        </li>";
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