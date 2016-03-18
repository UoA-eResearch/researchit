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
    drupal_add_css(path_to_theme().'/css/chooser.css', array("group" => CSS_THEME, "every_page" => FALSE));
  }
  if ($variables['type'] == 'service') {
    drupal_add_css(path_to_theme().'/css/service.css', array("group" => CSS_THEME, "every_page" => FALSE));
  }
  if (drupal_is_front_page()) {
    drupal_add_css(path_to_theme().'/css/frontpage.css', array("group" => CSS_THEME, "every_page" => FALSE));
  }
}
