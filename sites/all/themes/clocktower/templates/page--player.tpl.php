<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="page">
  <?php print $messages; ?>
  <div id="main">
    <div id="content" class="column" role="main">
      <?php print render($page['content']); ?>
    </div>
  </div>
</div>