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

<div class="col s12 m12 l3">
  <div class="card hoverable small">
  	<div class="card-image white-text" style="max-height:10px">
    	<?php //echo $fields['field_card_image']->content ?>
      <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/red-darken1.jpg" alt="" height="10">
    </div>
    <div class="card-content">
      <span class="card-title"><?php echo $fields['name']->content ?></span>
      <p><?php echo $fields['field_summary']->content . '<ul class="collection">';
          /*foreach (taxonomy_select_nodes($fields['tid']->raw) as $i => $nid) {
            if ($i > 0) break;
            $node = node_load($nid);
            $link = l($node->title, 'node/'.$nid);
            if (!empty($node->field_summary)) {
              $desc = $node->field_summary['und'][0]['value'];
            } else {
              $desc = 'What should I know?';
            }
            $color = 'red';
			$glyph = "dashboard";
            if ($node->type == 'guide') {
              $color = 'purple';
			  $glyph = "insert_chart";
            }
            echo "<li class='collection-item avatar'>
				<i class='material-icons circle $color'>$glyph</i>
				<span class='title'>$link</span>
				<p>$desc</p>
			</li>";
          }
          echo '</ul>'; */
      ?></p>
      <span style="float:right"><?php echo str_replace($fields['name']->raw, '<i class="small material-icons">info_outline</i> More info', $fields['name']->content) ?></span>
    </div>
    <div class="card-action" style="padding: 0px">
      <span style="display:inline-block; text-align:center; width:20%; background-colour: rgb(142,36,170)">1</span>
      <span style="display:inline-block; text-align:center; width:20%; background-colour: rgb(30,136,229)">2</span>
      <span style="display:inline-block; text-align:center; width:20%; background-colour: rgb(67,160,71)">3</span>
      <span style="display:inline-block; text-align:center; width:20%; background-colour: rgb(255,179,0)">4</span>
      <span style="display:inline-block; text-align:center; width:20%; background-colour: rgb(229,57,53)">5</span>
    </div>
  </div>
</div>
