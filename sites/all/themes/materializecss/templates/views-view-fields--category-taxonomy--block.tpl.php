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
  <div class="card hoverable medium">
  	<div class="card-image white-text" style="max-height:80px">
    	<?php echo $fields['field_card_image']->content ?>
        <span class="card-title"><?php echo $fields['name']->content ?></span>
    </div>
    <div class="card-content">
      <p><?php echo $fields['description']->content . '<ul class="collection">';
          foreach (taxonomy_select_nodes($fields['tid']->raw) as $i => $nid) {
            if ($i > 1) break;
            $node = node_load($nid);
            $link = l($node->title, 'node/'.$nid);
            if (!empty($node->body)) {
              $desc = $node->body['und'][0]['value'];
            } else {
              $desc = 'What should I know?';
            }
            echo "<li class='collection-item avatar'>
				<i class='material-icons circle green'>insert_chart</i>
				<span class='title'>$link</span>
				<p>$desc</p>
			</li>";
          }
          echo '</ul>';
      ?></p>
    </div>
    <div class="card-action">
      <span style="float:left"><?php echo str_replace($fields['name']->raw, '<i class="small material-icons">info_outline</i> More info', $fields['name']->content) ?></span>
      <span style="float:right"><a href="<?php echo $fields['field_chooser']->content ?>"><i class="small material-icons">view_module</i> Help Me Choose</a></span>
      
    </div>
  </div>
</div>