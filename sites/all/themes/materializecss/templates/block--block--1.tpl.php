<?php
/**
 * @file
 * Materialize theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @ingroup themeable
 */
?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_suffix['contextual_links']); ?>
  <a class="element-invisible">Block title</a>
  <div<?php if (!empty($wrapper)) print drupal_attributes($wrapper); ?>>
    <?php print render($title_prefix); ?>
    <?php if (!empty($title)): ?>
      <h4<?php print $title_attributes; ?>><?php print $title; ?></h4>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <div<?php print $content_attributes; ?>>
      <a class="element-invisible">Block content</a>
      <div class="row valign-wrapper">
        <div class="col s3 center-align" style="font-size: 28px">
          <b>Discover</b>, <b>request</b> </br>
          and <b>manage</b> services
          that support </br>
          your <b>research</b>
        </div>
        <div class="col s6">
          <div class="col s12">
            <div class="card-panel amber lighten-2 valign-wrapper" style="float:left; width: 70%; padding-top:15px; padding-bottom:15px; margin-top:0px">
              <span class="valign">
                <h5 style="margin-top:0px">Search by lifecycle <i class="material-icons">info_outline</i></h5>
                <h7 style="font-weight:300">Match services against your research workflow</h7>
              </span>
            </div>
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/upArrow.png" alt="" height="100px" width="100px" style=""margin-left:15px>
          </div>
          <div class="col s12">
            <div class="card-panel amber lighten-2 valign-wrapper" style="float:right; width: 70%; padding-top:15px; padding-bottom:15px; margin-bottom: 0px">
              <span class="valign right-align">
                <h5 style="margin-top:0px">Search by categories <i class="material-icons">info_outline</i></h5>
                <h7 style="font-weight:300">Discover services by their purpose</h7>
              </span>
            </div>
            <img typeof="foaf:Image" src="https://researchit.cer.auckland.ac.nz/sites/default/files/downArrow.png" alt="" height="100px" width="100px" style="float:right; margin-right: 10px">
          </div>
        </div>
        <div class="col s3">
          <div class="card-panel amber lighten-3 valign-wrapper">
            <h6>My Research Projects</h6>
            <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Create and Manage</a>
            </br>
            <a class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Request Services</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section> <!-- /.block -->
