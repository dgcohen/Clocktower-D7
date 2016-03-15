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
      <?php $menu = menu_tree_all_data('main-menu'); ?>
      <?php if ($menu): ?>
        <?php $main_nav = menu_tree_output($menu); ?>
        <?php print drupal_render($main_nav); ?>
      <?php endif; ?>
    </div>
  </div>

  <header class="header" id="header" role="banner">
    <?php print $messages; ?>
    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
    <?php endif; ?>
    <div class="header-links">
      <div class="nav-buttons">
        <a class="play-button" href="#" onclick="window.open('/player/12771/0', 'newwindow', 'width=460, height=510'); return false;"><p>Listen Now</p></a>
        <div class="donate-subscribe">
          <a href='#' class="donate-button">Donate</a>
          <a href='#' class="donate-button">Subscribe</a>
        </div>
      </div>
      <?php print render($page['header']); ?>
    </div>
  </header>
  <div id="main-menu">
    <?php print render($main_nav); ?>
  </div>
  <div id="main">
    <div id="content" class="column" role="main">
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php if (in_array('page__taxonomy__term', $theme_hook_suggestions) && $title): ?><h2 class="label" id="page-title">#<?php print $title; ?></h2><?php endif; ?>
      <?php print render($page['content']); ?>

      <?php if(isset($clocktower_popup) && !empty($clocktower_popup)): ?>
        <?php if ($clocktower_popup['enabled'] && strtotime($clocktower_popup['start_date']) < strtotime('now') && strtotime($clocktower_popup['end_date']) > strtotime('now')): ?>
          <div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
            <div class="logo-text">
              <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo site-logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
              <?php endif; ?>
              <div class="text">
                <p><?php print($clocktower_popup['text']); ?></p>
                <a class="play-button" href="#" onclick="window.open('/player/12771/0', 'newwindow', 'width=460, height=510'); return false;"></a>
              </div>
            </div>
          </div>
          <a href="#test-popup" class="open-popup-link" data-effect="mfp-zoom-in">Show inline popup</a>
          <?php endif; ?>
      <?php endif; ?>
    </div>

  </div>

  <?php print render($page['footer']); ?>

</div>

<?php print render($page['bottom']); ?>
