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
<a href="<?php echo $fields['field_link']->content ?>">
  <div class="col s12 m12 l3" >
    <div class="card hoverable small">
      <div class="card-image white-text" >
        <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/amber-darken1.jpg" alt="">
        <span class="card-title" style="font-weight:500; line-height: 20px"><?php echo $fields['name']->content ?></span>
        <i class='material-icons medium' style="position:absolute; color:white; top: 20px; right: 20px">gavel</i>
      </div>
      <div class="card-content">
        <p style='color:black'>Policy</p>
      </div>
      <div class="card-action" style="padding: 0px; width: 100%; font-size: 0; border-top:0px">
      </div>
    </div>
  </div>
</a>
