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

  <div class="mobile-nav">
    <div class="menu-btn"></div>
    <div class="responsive-menu">
      <?php $menu = menu_tree_all_data('navigation'); ?>
      <?php if ($menu): ?>
        <?php $main_nav = menu_tree_output($menu); ?>
        <?php print drupal_render($main_nav); ?>
      <?php endif; ?>
    </div>
  </div>

  <header class="header" id="header" role="banner">
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>
    <div class="header-links">
      <div class="nav-buttons">
        <a href="#" class="play-button"></a>
        <a href='#' class="donate-button">Donate</a>
        <a href='# ' class="donate-button">Subscribe</a>
      </div>
      <?php print render($page['header']); ?>
    </div>
  </header>

  <div id="main">
    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <div id="nav">
        <aside class="sidebars">
          <?php print $sidebar_first; ?>
          <?php print $sidebar_second; ?>
        </aside>
      </div>
    <?php endif; ?>

    <div id="content" class="column" role="main">
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>

  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
