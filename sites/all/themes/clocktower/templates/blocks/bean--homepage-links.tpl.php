<?php
/**
 * @file
 * Default theme implementation for beans.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) entity label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-{ENTITY_TYPE}
 *   - {ENTITY_TYPE}-{BUNDLE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      foreach ($content['field_homepage_links']['#items'] as $item) {
        $ids[] = $item['value'];
      }
      $links = field_collection_item_load_multiple($ids);
      foreach ($links as $delta => $link) {
        $title = field_get_items('field_collection_item', $link,'field_link_title')[0]['value'];
        $url = field_get_items('field_collection_item', $link, 'field_url')[0]['value'];
        $desc = field_get_items('field_collection_item', $link, 'field_short_description')[0]['value'];
        $image_display = field_info_instance('field_collection_item', 'field_image', $link->field_name)['display'];
        $image = field_view_field('field_collection_item', $link, 'field_image', $image_display['default']);
        $image_style = $image[0]['#image_style'];
        $image_path = $image[0]['#item']['uri'];
        $image_url = image_style_url($image_style, $image_path);
        print theme('html_tag', array(
          'element' => array(
          '#tag' => 'a',
          '#attributes' => array(
            'href' => $url,
            'style' => 'background-image: url(' . $image_url . ')',
            ),
          '#value' => '<span class="overlay"></span><div class="title">' . $title . 
                      '</div><div class="description">' . $desc . '</div>',
          ),
        ));
      }
    ?>
  </div>
</div>
