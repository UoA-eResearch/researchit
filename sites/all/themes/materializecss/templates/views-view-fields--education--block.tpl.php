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
<div class="col s12 m12 l4" >
  <div class="card hoverable">
    <div class="card-image white-text" style="max-height:10px">
        <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/light-green-darken1.jpg" alt="" height="10" width="400">
    </div>
            <div class="card-content" style="padding-top:0px; padding-bottom:0px">
      <ul class="collection" style="margin: 0px;">
            <li class='collection-item avatar'>
            <i class='material-icons circle green'>insert_chart</i>
            <span class='title'><?php echo $fields['title']->raw ?></span>
            <p><?php echo $fields['field_summary']->content ?></p>
        </li>
      </ul>
    </div>
  </div>
</div>
