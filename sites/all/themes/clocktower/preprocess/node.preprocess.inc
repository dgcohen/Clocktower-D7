<?php

/**
 * @file
 * Contains a pre-process hook for 'node'.
 */

/**
 * Implements hook_preprocess_node().
 *
 */
function clocktower_preprocess_node(&$variables, $hook) {
  dpm($variables);
  dpm("HREE");
  $variables = array();
}