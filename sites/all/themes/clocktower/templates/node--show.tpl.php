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
        <div class="teaser-image-container">
          <?php print('<a href="/' . $alias . '" style="background: url(' . $image_url . ') no-repeat" class="teaser-image"></a>'); ?>
        </div>
        <?php print render($title_prefix); ?>
        <?php if (!$page && $title): ?>
          <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

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

    <?php print render($content['body']); ?>
    <?php print render($content['links']); ?>

    <?php print render($content['comments']); ?>

  </article>
<?php else: ?>
  <article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="node-header">
      <div class="node-type">
        <a href="/radio" class="label">Radio Show</a>
      </div>
      <div class="node-header-info">
        <?php if($type == 'event' && $field_event_date): ?>
          <?php print render($content['field_event_date']); ?>
        <?php elseif($type == 'exhibition' && $field_dates): ?>
          <?php print render($content['field_dates']); ?>
        <?php elseif($type == 'show' && $field_series): ?>
          <?php print render($content['field_series'][0]); ?>
        <?php elseif($type == 'blog' && $field_blog_categories): ?>
          <?php print render($content['field_blog_categories']); ?>
        <?php elseif($type == 'series' && $field_included_shows): ?>
          <?php print count($content['field_included_shows']); ?> Episodes
        <?php endif; ?>
      </div>
    </div>
    <div class="node-body">
      <div class="node-text">
        <div class="node-content">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($unpublished): ?>
            <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
          <?php endif; ?>

          <div class="credits">
            <?php if(isset($field_host) && !empty($field_host)): ?>
              <div class="credit">
                <h4>Hosted by</h4>
                <?php print render($content['field_host']); ?>
              </div>
            <?php endif; ?>
            <?php if(isset($field_producer) && !empty($field_producer)): ?>
              <div class="credit">
                <h4>Produced by</h4>
                <?php print render($content['field_producer']); ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="content"<?php print $content_attributes; ?>>
            <div class="node-image">
              <?php print render($content['field_image']); ?>
            </div>
            <div class="social-links">
              <a class="play-button" href="#" onclick="window.open('/player/<?php print $field_series[0]['nid'] ?>/<?php print $node->nid ?>', 'newwindow', 'width=460, height=510'); return false;"></a>
              <a class="facebook" href="facebook.com"></a>
              <a class="twitter" href="twitter.com"></a>
            </div>
            <?php print render($content['body']); ?>
            <div class="aired">
              <p>Originally aired: </p>
              <?php print render($content['field_aired_date']); ?>
              <?php if(isset($field_media_embed) && !empty($field_media_embed)): ?>
                <?php print render($content['field_media_embed']); ?>
              <?php endif; ?>
              <?php if(isset($field_support) && !empty($field_support)): ?>
                <?php print render($content['field_support']); ?>
              <?php endif; ?>
              <?php dpm($content); ?>
            </div>

            <div class="tags">
              <?php if(array_key_exists('field_artist', $content)): ?>
                <?php print render($content['field_artist']); ?>
              <?php endif; ?>
              <?php if(array_key_exists('field_blog_categories', $content)): ?>
                <?php print render($content['field_blog_categories']); ?>
              <?php endif; ?>
              <?php if(array_key_exists('field_categories', $content)): ?>
                <?php print render($content['field_categories']); ?>
              <?php endif; ?>
              <?php if(array_key_exists('field_radio_tags', $content)): ?>
                <?php print render($content['field_radio_tags']); ?>
              <?php endif; ?>
              <?php if(array_key_exists('field_tags', $content)): ?>
                <?php print render($content['field_tags']); ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="node-related">
      <?php if(isset($field_series) && !empty($field_series)): ?>
        <div class="title item">
          <p>Other Episodes From</p>
          <?php print render($content['field_series'][0]); ?>
          <?php print views_embed_view('also_in_this_series', 'default', $field_series[0]['nid'], $node->nid); ?>
      <?php endif; ?>
    </div>
  </article>

<?php endif; ?>
