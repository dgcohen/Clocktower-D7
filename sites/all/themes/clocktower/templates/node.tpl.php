<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<?php if ($teaser): ?>
  <article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

    <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
      <header>
        <?php $image_display = field_info_instance('node', 'field_image', $node->type)['display']; ?>
        <?php $image_style = $image_display['teaser']['settings']['image_style']; ?>
        <?php $image_path = $field_image[0]['uri']; ?>
        <?php $image_url = image_style_url($image_style, $image_path); ?>
        <?php $alias = drupal_get_path_alias('node/' . $node->nid); ?>
        <?php print('<a href="/' . $alias . '" style="background: url(' . $image_url . ') no-repeat" class="teaser-image"></a>'); ?>
        <?php print render($title_prefix); ?>
        <?php if (!$page && $title): ?>
          <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <?php if ($display_submitted): ?>
          <p class="submitted">
            <?php print $user_picture; ?>
            <?php print $submitted; ?>
          </p>
        <?php endif; ?>

        <?php if ($unpublished): ?>
          <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
        <?php endif; ?>
      </header>
    <?php endif; ?>

    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
    ?>
    <?php print truncate_utf8(render($content['body']), 350, TRUE, TRUE); ?>
    <?php print render($content['links']); ?>

    <?php print render($content['comments']); ?>

  </article>
<?php else: ?>
  <article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="node-body">
      <div class="col-left">
        <div class="node-header">
          <a class="node-type <?php print $type; ?>" href="/<?php print $type; ?>">
            <?php print strtoupper(node_type_get_name($type)); ?>
          </a>
          <?php if($type == 'event'): ?>
            <div class="event-dates"><?php print render($content['field_event_date']); ?></div>
          <?php endif; ?>
        </div>
        <div class="node-content">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($unpublished): ?>
            <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
          <?php endif; ?>
          <div class="content"<?php print $content_attributes; ?>>
            <div class="social-links">
              <a class="facebook" href="facebook.com"></a>
              <a class="twitter" href="twitter.com"></a>
            </div>
            <?php print render($content['body']); ?>
          </div>
        </div>
      </div>
      <div class="col-right">
        <?php print render($content['field_image']); ?>
      </div>
    </div>
    <div class="node-related">
        <?php if($node->type == "show" && $field_series) { ?>

        <div class="also-list">
          <div class="title item">
            <p>Other Episodes From</p>
            <h3><?php print $field_series[0]['node']->title ?></h3>
            <div class="series-contents">
            <?php print views_embed_view('also_in_this_series', 'default', $field_series[0]['nid'], $node->nid); ?>
            </div>
          </div>
        </div>
        <?php }; ?>
    </div>
  </article>

<?php endif; ?>