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

<div class="col s12 m6 l3">
  <div class="card hoverable small">
  		<div class="card-image white-text" style="max-height:60px">
			<?php //echo $fields['field_card_image']->content ?>
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/red-darken1.jpg" alt="" height="80" width="400">
            <span class="card-title" style="padding-bottom:10px"><?php echo $fields['title']->content; ?></span>
        </div>
    <div class="card-content">
      <?php echo $fields['body']->content . '<br>Category:' . $fields['field_category']->content; ?>
    </div>
    <div class="card-action">
      <?php echo str_replace($fields['title']->raw, 'More info', $fields['title']->content) ?>
    
    </div>
  </div>
</div>
