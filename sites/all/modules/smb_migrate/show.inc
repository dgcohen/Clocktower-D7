<?php

/**
 * @file show.inc
 * Show nodes migration from drupal 6 to 7.
 */

class ShowMigration extends SMBNodeMigration {
  public function __construct(array $arguments) {
    parent::__construct($arguments);

    $this->addFieldMapping('is_new', NULL, FALSE)->defaultValue(TRUE);
    $this->addFieldMapping('nid', 'nid');

     $this->addFieldMapping('field_image', 'field_image')
          ->sourceMigration('File');
     $this->addFieldMapping('field_image:file_class')
          ->defaultValue('MigrateFileFid');
    $this->addFieldMapping('field_image:title', 'field_image:description')
         ->defaultValue('MigrateFileFid');
     $this->addFieldMapping('field_image:alt', 'field_image:description')
          ->defaultValue('MigrateFileFid');
    $this->addFieldMapping('field_image:preserve_files')
         ->defaultValue('MigrateFileFid');

    $this->addFieldMapping('field_aired_date', 'field_aired_date');

    $this->addFieldMapping('field_news', 'field_news')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_media_embed', 'field_media_embed');
    $this->addFieldMapping('field_media_embed:value', 'field_media_embed:value');
    $this->addFieldMapping('field_media_embed:format', 'field_media_embed:format')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_audio_path', 'field_audio_path');
    $this->addFieldMapping('field_audio_path:field_audio_path_value', 'field_audio_path:field_audio_path_value')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('field_related_to', 'field_reference_event');
    $this->addFieldMapping('field_related_to:field_related_to_nid', 'field_reference_event:field_reference_event_nid');

    $this->addFieldMapping('field_host', 'field_host');
    $this->addFieldMapping('field_host:field_host_nid', 'field_host:field_host_nid');

    $this->addFieldMapping('field_producer', 'field_producer');
    $this->addFieldMapping('field_producer:field_producer_nid', 'field_producer:field_producer_nid');

    $this->addFieldMapping('field_series', 'field_series');
    $this->addFieldMapping('field_series:field_series_nid', 'field_series:field_series_nid');

    $this->addFieldMapping('field_support', 'field_support');
    $this->addFieldMapping('field_support:value', 'field_support:value')
         ->callbacks(array($this, 'mapFormat'));

    $this->addFieldMapping('body:summary', 'field_summary');
    $this->addFieldMapping('body:summary:format', 'field_summary:format');

     $this->addFieldMapping('field_tags', 2)
          ->sourceMigration('Tags');
     $this->addFieldMapping('field_tags:source_type')
          ->defaultValue('tid');
     $this->addFieldMapping('field_tags:create_term')
          ->defaultValue('tid');
      $this->addFieldMapping('field_tags:ignore_case')
           ->defaultValue('tid');

     $this->addFieldMapping('field_artist', 107)
          ->sourceMigration('Artist');
     $this->addFieldMapping('field_artist:source_type')
          ->defaultValue('tid');
    $this->addFieldMapping('field_artist:create_term')
         ->defaultValue('tid');
     $this->addFieldMapping('field_artist:ignore_case')
          ->defaultValue('tid');

     $this->addFieldMapping('field_radio_tags', 106)
          ->sourceMigration('RadioTags');
     $this->addFieldMapping('field_radio_tags:source_type')
          ->defaultValue('tid');
    $this->addFieldMapping('field_radio_tags:create_term')
         ->defaultValue('tid');
     $this->addFieldMapping('field_radio_tags:ignore_case')
          ->defaultValue('tid');
  }
}
