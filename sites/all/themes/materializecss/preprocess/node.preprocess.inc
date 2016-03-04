<?php

/**
 * @file
 * Contains preprocess functions for node.
 */

/**
 * Implements hook_preprocess_node().
 */
function materialize_preprocess_node(&$variables) {
  if(current_path() == 'node/2') {
    drupal_add_js(path_to_theme().'/js/chooser.js');
    drupal_add_css(path_to_theme().'/css/chooser.css');
  }
  if ($variables['type'] == 'service') {
    drupal_add_css(path_to_theme().'/css/service.css');
  }
}
