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

  <div class="row valign-wrapper">
    <div class="col m2 l1">
      <i class="large material-icons circle amber">library_books</i>
    </div>
    <div class="col m10 l11">
      <span class="black-text">
        <?php print render($content['description']) ?>
      </span>
    </div>
  </div>

  <div class="content">
      <div class="row">
      <?php if (!empty($content['description'])): ?>
        <div class="col s6 description">
          <div class="card hoverable small" style="max-height:200px">
          	<div class='card-image white-text' style="max-height:50px">
                <img src='/sites/default/files/light-green-darken1.jpg' height='80' width='400'>
                <span class='card-title' style='padding-bottom:8px;'>Background Information</span>
            </div>
            <div class="card-content">
              <p><?php print render($content['field_background_information']) ?></p>
              <!-- <a href="<?php print $term_url; ?>" class="read_more">Read more...</a> -->
            </div>
          </div>
        </div>
      <?php endif; ?>
      <div class="col s6 chooser">
        <div class="card hoverable small" style="max-height:200px">
              <div class='card-image white-text' style="max-height:50px">
              <img src='/sites/default/files/amber-darken1.jpg' height='80' width='400'>
              <span class='card-title' style='padding-bottom:8px;'>Help me choose the right <?php print $term_name ?> service</span>
          </div>
          <div class="card-content">
              <ul class="collection">
                  <li class="collection-item avatar">
                    <i class="large material-icons circle amber">thumbs_up_down</i>
                    <span class="title"><?php
                    if (!empty($content['field_chooser'])) {
                      print render($content['field_chooser']);
                    } else {
                      print '<a href="#">Help me choose</a>';
                    }
                    ?></span>
                    <p>Which <?php print $term_name ?> service is right for me? <br>

                    </p>
                  </li>
              </ul>
          </div>
        </div>
      </div>
      </div>
      <br />
      <hr />
      <br />

      <h4><?php print $term_name ?> Services/Guides</h4>
    <div class='row'>
      <?php
      $vocab = taxonomy_vocabulary_machine_name_load('research_life_cycle');
      $terms = taxonomy_get_tree($vocab->vid, 0, NULL, TRUE);

      echo "<div class='row' style='margin-bottom: 0px;'>";
      echo  "<span class='col s6' style='padding:15px'>Name</span>";
      echo  "<span class='col s6'> <div class='row' style='margin-bottom: 0px;'>";
      foreach ($terms as $t) {
        echo "  <span class='col s2' style='color:white;padding:15px;background-color:{$t->field_color['und'][0]['rgb']}'>{$t->name}</span>";
      }
      echo '  </div>';
      echo '</div>';

      $tids = taxonomy_select_nodes($term->tid);
      $nodes = array();
      foreach ($tids as $tid) {
        $nodes[] = node_load($tid);
      }
      usort($nodes, function($a, $b) {
        return $a->type < $b->type;
      });

      $lastType = '';
      $count = 0;
      foreach ($nodes as $node) {
              $desc = !empty($node->field_summary) ? $node->field_summary['und'][0]['value'] : 'What should I know?';
              $link = url('node/'.$node->nid);
              $more_info = str_replace($node->title, 'More info', $link);
              if ($count % 2 == 0){
                $color = 'rgba(229, 57, 53, 0.6)';
                $textColour = 'white';
              } else {
                $color = 'rgba(229, 57, 53, 0)';
                $textColour = 'red';
              }
              $count = $count + 1;

              if ($node->type == 'guide') {
                $color = '#8e24aa';
              }
              if ($lastType != $node->type) {
                print ucfirst($node->type) . 's';
                $lastType = $node->type;
              }
              print "<div class='row' style='margin-bottom: 0px;'>
                      <a href='$link'>
                        <span class='title col s6' style='height:74px;background-color:$color;padding:15px;color:$textColour'>
                          {$node->title}
                        </span>
                      </a>";
              echo  "<span class='col s6'> <div class='row' style='margin-bottom: 0px;'>";
              $stages = array();
              if (!empty($node->field_research_lifecycle_stage['und'])) {
                foreach ($node->field_research_lifecycle_stage['und'] as $tidWrapper) {
                  $stages[] = $tidWrapper['tid'];
                }
              }
              foreach ($terms as $t) {
                if (in_array($t->tid, $stages)) {
                  echo "<span class='col s2' style='height:74px;background-color:{$t->field_color['und'][0]['rgb']};padding:15px;'></span>";
                } else {
                  echo "<span class='col s2' style='height:74px; padding:15px; background-color:$color;'></span>";
                }
              }
              print "</div>";
              print "</div>";
            }
      ?>
    </div>
  </div>

</div>
