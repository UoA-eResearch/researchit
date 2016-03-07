<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="taxonomy-term-<?php print $term->tid; ?>" class="<?php print $classes; ?>">

  <h2><a href="<?php print $term_url; ?>"><?php print $term_name; ?></a></h2>

  <div class="content">
      <div class="row">
      <?php if (!empty($content['description'])): ?>
        <div class="col s6 description">
          <div class="card hoverable small">
            <div class="card-content">
              <p><?php print render($content['description']) ?></p>
              <a href="<?php print $term_url; ?>" class="read_more">Read more...</a>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if (!empty($content['field_chooser'])): ?>
        <div class="col s6 chooser">
          <div class="card hoverable small">
            <div class="card-content">
              <span class="card-title"><?php print render($content['field_chooser']) ?></span>
              <p>Which service is right for me?</p>
            </div>
          </div>
        </div>
      <?php endif; ?>
      </div>
    <div class='row'>
      <?php foreach (taxonomy_select_nodes($term->tid) as $i => $nid) {
              print '<div class="col s3">' . render(node_view(node_load($nid), 'teaser')) . '</div>';
            }
      ?>
    </div>
  </div>

</div>
