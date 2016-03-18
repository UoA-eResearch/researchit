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
<div class="col s12 m12 research_lifecycle_stage <?php echo $machine_name ?>" style="display:none">
    <div class="card hoverable">
        <div class="card-image waves-effect waves-block waves-light" style="max-height:150px">
          <img class="activator" src="<?php echo $url ?>">
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><?php echo $fields['name']->raw ?><i class="material-icons right">more_vert</i></span>
          <!--
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4"><?php echo $fields['name']->raw ?><i class="material-icons right">close</i></span>
          -->
          <p><?php echo $fields['description']->raw ?></p>
          <ul class='collection'>
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
              foreach ($categorySorted as $tid => $t) {
                $term = $t['term'];
                $term_title = taxonomy_term_title($term);
                $link = taxonomy_term_uri($term);
                $link = drupal_get_path_alias($link['path']);
                            
                            // Prints out the service category title
                print "<a href='$link'><h4>$term_title</h4></a>";
                
                usort($t['nodes'], "materialize_compare_type");
                            
                foreach ($t['nodes'] as $node) {
                  $link = l($node->title, 'node/'.$node->nid);
                  if (!empty($node->body)) {
                    $desc = $node->body['und'][0]['value'];
                  } else {
                    $desc = 'What should I know?';
                  }
                  $color = 'red';
                  if ($node->type == 'guide') {
                    $color = 'purple';
                  }
                              
                              // Prints out the actual service
                  echo "<li class='collection-item avatar'>
                          <i class='material-icons circle $color'>insert_chart</i>
                          <span class='title'>$link</span>
                          <p>$desc</p>
                        </li>";
                }
              }
            ?>
            
          </ul>
        </div>
    </div>
</div>