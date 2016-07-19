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

<a id='guides' class='anchor'></a>
<a href="<?php echo $fields['path']->content ?>">
  <div class="col s12 m12 l3" >
    <div class="card hoverable small">
      <div class="card-image white-text" >
          <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/deep-purple-darken1.jpg" alt="">
          <span class="card-title" style="font-weight:500; margin-top: 10px; line-height:32px;"><?php echo $fields['title']->content ?></span>
          <i class='material-icons medium' style="position:absolute; color:white; top: 20px; right: 20px">bookmark</i>
      </div>
      <div class="card-content" style="padding-top:15px; padding-bottom:0px">

        <p style="margin-top:5px;color:black">Might be useful?</p>
      </div>
    </div>
  </div>
</a>