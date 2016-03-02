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
    <?php print truncate_utf8(render($content['body']), 350, TRUE, TRUE); ?>
    <?php print render($content['links']); ?>

    <?php print render($content['comments']); ?>

  </article>
<?php else: ?>
  <article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="node-body">
      <div class="col-left">
        <div class="node-header">
          <div class="node-type">
            <?php if($node->type == "show"): ?>
              <a href="/radio">Radio Show</a>
            <?php elseif($node->type == "event"): ?>
              <a href="/events">Event</a>
            <?php elseif($node->type == "blog"): ?>
              <a href="/news">News</a>
            <?php elseif($node->type == "series"): ?>
              <a href="/radio">Radio Series</a>
            <?php endif; ?>
          </div>
          <div class="node-header-info">
            <?php if($type == 'event'): ?>
              <?php print render($content['field_event_date']); ?>
            <?php elseif($type == 'show'): ?>
              <?php print render($content['field_series'][0]); ?>
            <?php elseif($type == 'blog'): ?>
              <?php print render($content['field_blog_categories']); ?>
            <?php elseif($type == 'series'): ?>
              <?php print count($content['field_included_shows']); ?> Episodes
            <?php endif; ?>
          </div>
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

          <div class="credits">
            <?php if($node->type == "show" && $field_host): ?>
              <div class="credit">
                <h4>Hosted by</h4>
                <?php print render($content['field_host']); ?>
              </div>
            <?php endif; ?>
            <?php if($node->type == "show" && $field_producer): ?>
              <div class="credit">
                <h4>Produced by</h4>
                <?php print render($content['field_producer']); ?>
              </div>
            <?php endif; ?>
          </div>
          
          <div class="content"<?php print $content_attributes; ?>>
            <div class="social-links">
              <?php if($node->type == "show"): ?>
                <a class="play-button" href="#" onclick="window.open('/player/<?php print $field_series[0]['nid'] ?>/<?php print $node->nid ?>', 'newwindow', 'width=647, height=551'); return false;"></a>
              <?php elseif($node->type == "series" || $node->type == "channel"): ?>
                <a class="play-button" href="#" onclick="window.open('/player/<?php print $node->nid ?>/0', 'newwindow', 'width=647, height=551'); return false;"></a>
              <?php endif; ?>
              <a class="facebook" href="facebook.com"></a>
              <a class="twitter" href="twitter.com"></a>
            </div>
            <?php print render($content['body']); ?>
            <?php if ($submitted): ?>
              <div class="date-in-parts">
                <span class="label">Posted</span>
                <span class="month"><?php echo date("F", $node->created); ?></span>
                <span class="day"><?php  echo date("j", $node->created); ?></span>
                <span class="year"><?php echo date("Y", $node->created); ?></span>
              </div>   
            <?php endif; ?>
            <div class="tags">
              <?php if(array_key_exists('field_artist', $content)): ?>
                <?php print render($content['field_artist']); ?>
              <?php endif; ?>
              <?php if(array_key_exists('field_blog_categories', $content)): ?>
                <?php print render($content['field_blog_categories']); ?>
              <?php endif; ?>
              <?php if(array_key_exists('field_category', $content)): ?>
                <?php print render($content['field_category']); ?>
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
      <div class="col-right">
        <?php print render($content['field_image']); ?>
      </div>
    </div>
    <div class="node-related">
      <?php if($node->type == "show" && $field_series): ?>
        <div class="title item">
          <p>Other Episodes From</p>
          <?php print render($content['field_series'][0]); ?>
          <?php print views_embed_view('also_in_this_series', 'default', $field_series[0]['nid'], $node->nid); ?>
        </div>
      <?php elseif($node->type == "blog" && $field_related_to): ?>
        <div class="title item related">
          <p>Related</p>
          <?php print views_embed_view('related_to', 'default', $node->nid); ?>
        </div>
      <?php endif; ?>
    </div>
  </article>

<?php endif; ?>